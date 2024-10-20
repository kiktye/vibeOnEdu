<?php

namespace App\Http\Controllers\Api;

use Google\Client as GoogleClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Login with email and password
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Unknown credentials'], 401);
        }

        $user = User::where('email', $request->email)->first();

        $user->update([
            'last_login_at' => now(),
        ]);

        return response()->json([
            'token' => $user->createToken('auth_token')->plainTextToken
        ], 200);
    }

    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $emailExists = User::where('email', $request->email)->exists();

        if ($emailExists) {
            return response()->json(['message' => 'Email already taken'], 409);
        }

        return response()->json(['message' => 'Email available'], 200);
    }

    // Register with email and password
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:users',

            'gender' => 'required|string',
            // 'city' => 'required|string',
            'birth_date' => 'required|date',
            'phone' => 'required|string',
            'password' => 'required|string|min:6',
            // 'password_confirmation' => 'required|same:password',

            // 'topics' => 'required|array',
            // 'topics.*' => 'required|string',

            // 'study_time' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $userInfo = UserInfo::create([
            'user_id' => $user->id,
            'gender' => $request->gender,
            // 'city' => $request->city,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
            // 'study_time' => $request->study_time,
        ]);


        return response()->json([
            'token' => $user->createToken('auth_token')->plainTextToken
        ], 201);
    }

    // Logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out'], 200);
    }

    // Google login
    public function googleLogin(Request $request)
    {
        $client = new GoogleClient(['client_id' => env('GOOGLE_CLIENT_ID')]);

        try {
            $payload = $client->verifyIdToken($request->token);

            if (!$payload) {
                return response()->json(['message' => 'Invalid Google token'], 401);
            }

            $email = $payload['email'];
            $name = $payload['name'];

            // Find or create user
            $user = User::firstOrCreate(
                ['email' => $email],
                ['name' => $name, 'password' => Hash::make(uniqid())]
            );

            return response()->json([
                'token' => $user->createToken('auth_token')->plainTextToken
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Google token verification failed'], 400);
        }
    }

    // Facebook login
    public function facebookLogin(Request $request)
    {
        try {
            $response = Http::get('https://graph.facebook.com/me', [
                'fields' => 'id,name,email',
                'access_token' => $request->token
            ]);

            if ($response->failed()) {
                return response()->json(['message' => 'Invalid Facebook token'], 401);
            }

            $facebookUser = $response->json();
            $email = $facebookUser['email'];
            $name = $facebookUser['name'];

            // Find or create user
            $user = User::firstOrCreate(
                ['email' => $email],
                ['name' => $name, 'password' => Hash::make(uniqid())]
            );

            return response()->json([
                'token' => $user->createToken('auth_token')->plainTextToken
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Facebook token verification failed'], 400);
        }
    }
}

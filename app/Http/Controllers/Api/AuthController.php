<?php

namespace App\Http\Controllers\Api;

use Google\Client as GoogleClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Models\User;
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

        return response()->json([
            'token' => $user->createToken('auth_token')->plainTextToken
        ], 200);
    }

    // Register with email and password
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
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

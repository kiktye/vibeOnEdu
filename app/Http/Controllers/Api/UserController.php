<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new UserCollection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->load([
            'badges',
            'courses',
            'evaluations',
            'topics',
            'lectures.course',
            'userInfo',
            'certificates.course',
            'role'
        ]);

        $lastAchievedBadge = $user->badges()->latest('created_at')->first();

        $coursesInProgress = $user->courses()
            ->whereNotNull('started_at')
            ->whereNull('completed_at')
            ->get();

        $finishedCourses = $user->courses()
            ->whereNotNull('started_at')
            ->whereNotNull('completed_at')
            ->get();

        return (new UserResource($user))->additional([
            'lastAchievedBadge' => $lastAchievedBadge,
            'AllBadgesAchieved' => $user->badges,
            'coursesInProgress' => $coursesInProgress,
            'finishedCourses' => $finishedCourses
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

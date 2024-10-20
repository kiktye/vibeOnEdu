<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($user) {
            // Load the user's last badge and courses
            $lastAchievedBadge = $user->badges()->latest('created_at')->first();

            $coursesInProgress = $user->courses()
                ->whereNotNull('started_at')
                ->whereNull('completed_at')
                ->get();

            $finishedCourses = $user->courses()
                ->whereNotNull('started_at')
                ->whereNotNull('completed_at')
                ->get();

            $allBadgesAchieved = $user->badges()->get();

            return (new UserResource($user))->additional([
                'lastAchievedBadge' => $lastAchievedBadge,
                'AllBadgesAchieved' => $allBadgesAchieved,
                'CoursesInProgress' => $coursesInProgress,
                'FinishedCourses' => $finishedCourses,
            ]);
        });
    }
}

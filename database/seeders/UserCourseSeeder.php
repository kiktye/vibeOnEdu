<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all user IDs
        $userIds = DB::table('users')->pluck('id')->toArray();

        // Get all course IDs
        $courseIds = DB::table('courses')->pluck('id')->toArray();

        // Initialize an array to hold user-course assignments
        $userCourses = [];

        foreach ($userIds as $userId) {
            // Randomly assign a course to the user
            if (!empty($courseIds)) {
                $courseId = $courseIds[array_rand($courseIds)];
                
                // Randomly determine started_at and completed_at dates
                $startedAt = now()->subDays(rand(1, 30)); // Course started between 1 and 30 days ago
                $completedAt = rand(0, 1) ? $startedAt->copy()->addDays(rand(1, 10)) : null; // Randomly decide if completed

                $userCourses[] = [
                    'user_id' => $userId,
                    'course_id' => $courseId,
                    'started_at' => $startedAt,
                    'completed_at' => $completedAt,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert user-course assignments into the database
        DB::table('user_courses')->insert($userCourses);
    }
}

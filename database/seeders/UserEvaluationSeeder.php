<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserEvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all user IDs
        $userIds = DB::table('users')->pluck('id')->toArray();

        // Get all completed course IDs
        $completedCourseIds = DB::table('certificates')->pluck('course_id')->toArray();

        // Initialize an array to hold evaluations
        $evaluations = [];

        foreach ($userIds as $userId) {
            // Randomly assign a completed course to the user
            if (!empty($completedCourseIds)) {
                $courseId = $completedCourseIds[array_rand($completedCourseIds)];

                $evaluations[] = [
                    'user_id' => $userId,
                    'course_id' => $courseId,
                    'recommendation' => 0, // Randomly recommend or not
                    'grade' => $this->getRandomGrade(),
                    'message' => 'This is a sample evaluation message for course ' . $courseId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert evaluations into the database
        DB::table('user_evaluations')->insert($evaluations);
    }

    /**
     * Get a random grade.
     */
    private function getRandomGrade(): string
    {
        $grades = ['A', 'B', 'C', 'D', 'F']; // Define the possible grades
        return $grades[array_rand($grades)];
    }
}

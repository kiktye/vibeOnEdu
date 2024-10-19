<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all course IDs
        $courseIds = DB::table('courses')->pluck('id')->toArray();

        // Initialize an array to hold lectures
        $lectures = [];

        foreach ($courseIds as $courseId) {
            // Create a number of lectures for each course
            for ($i = 1; $i <= 5; $i++) { // Adjust the number of lectures per course
                $lectures[] = [
                    'course_id' => $courseId,
                    'name' => 'Lecture ' . $i . ' for Course ' . $courseId,
                    'description' => 'This is a description for Lecture ' . $i . ' of Course ' . $courseId,
                    'audio_path' => 'resources/Lekcii_mp3/test.m4a', // Fixed audio path
                    'duration' => 2, // Duration in seconds
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert lectures into the database
        DB::table('lectures')->insert($lectures);
    }
}

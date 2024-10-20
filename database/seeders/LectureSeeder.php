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
            // Create a random number of lectures for each course
            $numberOfLectures = rand(1, 5); // Adjust the range as needed

            for ($i = 1; $i <= $numberOfLectures; $i++) {
                $lectures[] = [
                    'course_id' => $courseId,
                    'name' => 'Lecture ' . $i . ' for Course ' . $courseId,
                    'description' => 'This is a description for Lecture ' . $i . ' of Course ' . $courseId,
                    'content' => $this->getRandomLectureContent(), // Get random content
                    'audio_path' => 'resources/Lekcii_mp3/test.m4a', // Fixed audio path
                    'duration' => rand(60, 300), // Random duration between 1 and 5 minutes
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert lectures into the database
        DB::table('lectures')->insert($lectures);
    }

    /**
     * Get random content for lectures.
     */
    private function getRandomLectureContent(): string
    {
        return json_encode([ // Example JSON structure for content
            'time' => time(),
            'blocks' => [
                [
                    'type' => 'header',
                    'data' => [
                        'text' => 'Lecture Content Header ' . rand(1, 100),
                        'level' => 2,
                    ],
                ],
                [
                    'type' => 'paragraph',
                    'data' => [
                        'text' => 'This is a random lecture content paragraph. More details about the topic will follow.',
                    ],
                ],
            ],
            'version' => '2.22.2',
        ]);
    }
}

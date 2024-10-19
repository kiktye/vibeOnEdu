<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all user IDs
        $userIds = DB::table('users')->pluck('id')->toArray();

        // Get all completed lecture IDs
        $completedLectureIds = DB::table('user_lectures')
            ->whereNotNull('completed_at')
            ->pluck('lecture_id')
            ->toArray();

        // Get all course IDs associated with completed lectures
        $courseIds = DB::table('lectures')
            ->whereIn('id', $completedLectureIds)
            ->pluck('course_id')
            ->unique()
            ->toArray();

        // Initialize an array to hold certificates
        $certificates = [];

        foreach ($userIds as $userId) {
            // Randomly assign a course that the user has completed
            $courseId = $courseIds[array_rand($courseIds)];

            $certificates[] = [
                'user_id' => $userId,
                'course_id' => $courseId,
                'image_path' => 'resources/Sertifikati/sertifikat.pdf', // Fixed image path
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert certificates into the database
        DB::table('certificates')->insert($certificates);
    }
}

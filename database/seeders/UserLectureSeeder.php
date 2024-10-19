<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserLectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all user IDs
        $userIds = DB::table('users')->pluck('id')->toArray();

        // Get all lecture IDs
        $lectureIds = DB::table('lectures')->pluck('id')->toArray();

        // Initialize an array to hold user-lecture assignments
        $userLectures = [];

        foreach ($userIds as $userId) {
            // Randomly assign between 1 and 3 lectures to each user
            $selectedLectures = array_rand(array_flip($lectureIds), rand(1, 3));

            // Ensure $selectedLectures is an array
            if (!is_array($selectedLectures)) {
                $selectedLectures = [$selectedLectures];
            }

            foreach ($selectedLectures as $lectureId) {
                $startedAt = now()->subDays(rand(1, 30)); // Random start date within the last 30 days
                $completedAt = rand(0, 1) ? $startedAt->copy()->addMinutes(2) : null; // Random completion time

                $userLectures[] = [
                    'user_id' => $userId,
                    'lecture_id' => $lectureId,
                    'started_at' => $startedAt,
                    'completed_at' => $completedAt,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert user-lecture assignments into the database
        DB::table('user_lectures')->insert($userLectures);
    }
}

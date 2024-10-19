<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserBadgesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all user IDs
        $userIds = DB::table('users')->pluck('id')->toArray();
        
        // Get all badge IDs
        $badgeIds = DB::table('badges')->pluck('id')->toArray();
        
        // Initialize an array to hold user-badge assignments
        $userBadges = [];

        foreach ($userIds as $userId) {
            // Randomly assign a badge to the user
            $badgeId = $badgeIds[array_rand($badgeIds)];

            $userBadges[] = [
                'user_id' => $userId,
                'badge_id' => $badgeId, // Assign one badge per user
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert user-badge assignments into the database
        DB::table('user_badges')->insert($userBadges);
    }
}

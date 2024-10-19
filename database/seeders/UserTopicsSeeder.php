<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get existing user IDs from user_info table
        $userIds = DB::table('user_info')->pluck('id')->toArray();

        // Get existing topic IDs from topics table
        $topicIds = DB::table('topics')->pluck('id')->toArray();

        // Assign 3 random topics to each user
        foreach ($userIds as $userId) {
            // Randomly select 3 topics for each user
            $assignedTopics = array_rand(array_flip($topicIds), 3); // Select 3 random topics

            foreach ((array)$assignedTopics as $topicId) {
                DB::table('user_topics')->insert([
                    'user_id' => $userId,
                    'topic_id' => $topicId,
                ]);
            }
        }
    }
}

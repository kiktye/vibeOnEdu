<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get existing user IDs and city IDs
        $users = DB::table('users')->pluck('id')->toArray();
        $cities = DB::table('cities')->pluck('id')->toArray();

        // Define possible study times
        $studyTimes = ['10-20 минути', '30 минути', '45 минути', '1 час'];

        foreach ($users as $userId) {
            DB::table('user_info')->insert([
                'user_id' => $userId,
                'city_id' => $faker->randomElement($cities),
                'phone' => $faker->phoneNumber,
                'gender' => $faker->randomElement(['M', 'F']),
                'birth_date' => $faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
                'image_path' => $faker->imageUrl(640, 480, 'people', true, 'Faker'), // Random avatar image
                'study_time' => $faker->randomElement($studyTimes),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
            UserSeeder::class,
            TopicSeeder::class,
            CitySeeder::class,
            UserInfoSeeder::class,
            UserTopicsSeeder::class,
            BadgesSeeder::class,
            ModuleSeeder::class,
            CourseSeeder::class,
            UserBadgesSeeder::class,
            LectureSeeder::class,
            UserLectureSeeder::class,
            MaterialsSeeder::class,
            CertificateSeeder::class,
            UserEvaluationSeeder::class,
            UserCourseSeeder::class,
        ]);
    }
}

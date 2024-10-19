<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get existing module IDs
        $moduleIds = DB::table('modules')->pluck('id')->toArray();

        $courses = [];

        foreach ($moduleIds as $moduleId) {
            for ($i = 1; $i <= 5; $i++) { // Start from 1 to make course names more user-friendly
                $courses[] = [
                    'module_id' => $moduleId,
                    'name' => 'Лична Финансиска Гимнастика ' . $i,
                    'description' => 'Оваа модулска обука е посветена на личната финансиска гимнастика, помагајќи ви да ги усовршите вашите финансиски вештини и знаења.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert courses into the database
        DB::table('courses')->insert($courses);
    }
}

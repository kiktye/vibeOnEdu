<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the modules
        $modules = [
            [
                'name' => 'Научи за себе',
                'description' => 'Оваа модула е посветена на личниот развој и учење. Подгответе се да откриете нови вештини и знаења кои ќе ви помогнат во вашето патување.',
            ],
            [
                'name' => 'Научи за својот бизнис',
                'description' => 'Оваа модула ќе ви помогне да ги подобрите вашите вештини во управувањето со бизнисот. Научете стратегии за успех и иновации во вашата индустрија.',
            ],
        ];

        // Insert modules into the database
        foreach ($modules as $module) {
            DB::table('modules')->insert([
                'name' => $module['name'],
                'description' => $module['description'],
            ]);
        }
    }
}

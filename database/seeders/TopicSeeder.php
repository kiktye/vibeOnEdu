<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('topics')->insert([
            ['name' => 'Biznis +'],
            ['name' => 'Finansii +'],
            ['name' => 'Budzetiranje +'],
            ['name' => 'Pretrpiemnistvo +'],
            ['name' => 'Investiranje +'],
            ['name' => 'Zasteda +'],
            ['name' => 'Prodazba +'],
        ]);
    }
}

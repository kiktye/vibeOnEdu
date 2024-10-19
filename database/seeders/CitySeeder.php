<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->insert([
            ['name' => 'Берово'],
            ['name' => 'Битола'],
            ['name' => 'Богданци'],
            ['name' => 'Валандово'],
            ['name' => 'Велес'],
            ['name' => 'Велес 1'],
            ['name' => 'Виница'],
            ['name' => 'Гевгелија'],
            ['name' => 'Гостивар'],
            ['name' => 'Дебар'],
            ['name' => 'Делчево'],
            ['name' => 'Демир Капија'],
            ['name' => 'Дојран'],
            ['name' => 'Кавадарци'],
            ['name' => 'Кичево'],
            ['name' => 'Кочани'],
            ['name' => 'Кратово'],
            ['name' => 'Крива Паланка'],
            ['name' => 'Крушево'],
            ['name' => 'Куманово'],
            ['name' => 'Македонска Каменица'],
            ['name' => 'Македонски Брод'],
            ['name' => 'Неготино'],
            ['name' => 'Нов Дојран'],
            ['name' => 'Охрид'],
            ['name' => 'Прилеп'],
            ['name' => 'Пробиштип'],
            ['name' => 'Радовиш'],
            ['name' => 'Ресен'],
            ['name' => 'Свети Николе'],
            ['name' => 'Скопје'],
            ['name' => 'Струга'],
            ['name' => 'Струмица'],
            ['name' => 'Тетово'],
            ['name' => 'Штип'],
        ]);
    }
}

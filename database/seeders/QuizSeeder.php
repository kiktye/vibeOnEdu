<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    public function run()
    {
        Quiz::create([
            'title' => 'Основни финансиски вештини',
            'description' => 'Опис'
        ]);

        Quiz::create([
            'title' => 'Управување со буџет',
            'description' => 'Опис'

        ]);
    }
}

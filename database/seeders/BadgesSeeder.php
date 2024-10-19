<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BadgesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the badges with names and image paths in Cyrillic, in the specified order
        $badges = [
            [
                'name' => 'Финансиски пионер',
                'image_path' => 'resources/img/Finansiski Pioner.svg',
            ],
            [
                'name' => 'Економски ентузијаст',
                'image_path' => 'resources/img/Ekonosmki Entuzijast.svg',
            ],
            [
                'name' => 'Капитален стратег',
                'image_path' => 'resources/img/Kapitalen Strateg.svg',
            ],
            [
                'name' => 'Лидер на иднината',
                'image_path' => 'resources/img/Lider na idninata.svg',
            ],
            [
                'name' => 'Иден CFO',
                'image_path' => 'resources/img/Iden CFO.svg',
            ],
        ];

        // Insert badges into the database
        foreach ($badges as $badge) {
            DB::table('badges')->insert([
                'name' => $badge['name'],
                'description' => sprintf(
                    'Вашата упорност и посветеност на учењето не останаа незабележани! Со гордост ви го доделуваме “%s” како признание за вашите достигнувања. Овој беџ не е само симбол на вашите напори, туку и потврда на вашето знаење и напредок во финансиската едукација. Споделете го овој успех со пријателите и мотивирајте и другите да започнат со своето патување! Додадете го овој беџ во вашата колекција и продолжете да учите нови работи. Ваша иднина е светла!',
                    $badge['name']
                ),
                'image_path' => $badge['image_path'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

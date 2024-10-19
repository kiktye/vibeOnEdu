<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all lecture IDs
        $lectureIds = DB::table('lectures')->pluck('id')->toArray();

        // Initialize an array to hold materials
        $materials = [];

        foreach ($lectureIds as $lectureId) {
            // Randomly decide the number of materials for each lecture
            $numberOfMaterials = rand(1, 3); // You can adjust this number

            for ($i = 1; $i <= $numberOfMaterials; $i++) {
                $type = $this->getRandomMaterialType();
                $content = $this->getRandomContent($type);

                $materials[] = [
                    'lecture_id' => $lectureId,
                    'type' => $type,
                    'content' => $content,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert materials into the database
        DB::table('materials')->insert($materials);
    }

    /**
     * Get a random material type.
     */
    private function getRandomMaterialType(): string
    {
        $types = ['text', 'image', 'audio'];
        return $types[array_rand($types)];
    }

    /**
     * Get random content based on the material type.
     */
    private function getRandomContent(string $type): string
    {
        switch ($type) {
            case 'text':
                return 'This is a random text content for the material.';
            case 'image':
                return 'https://cdn.corporatefinanceinstitute.com/assets/finance-definition.jpg'; // Specified image URL
            case 'audio':
                return 'resources/Lekcii_mp3/test.m4a'; // Fixed audio path
            default:
                return '';
        }
    }
}

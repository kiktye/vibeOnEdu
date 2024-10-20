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
                return json_encode([ // Convert to JSON
                    'time' => time(),
                    'blocks' => [
                        [
                            'type' => 'header',
                            'data' => [
                                'text' => 'Random Header ' . rand(1, 100),
                                'level' => 2,
                            ],
                        ],
                        [
                            'type' => 'paragraph',
                            'data' => [
                                'text' => 'This is a random text content for the material. Here is some more detail about the topic.',
                            ],
                        ],
                    ],
                    'version' => '2.22.2',
                ]);
            case 'image':
                return json_encode([ // Convert to JSON
                    'time' => time(),
                    'blocks' => [
                        [
                            'type' => 'image',
                            'data' => [
                                'file' => [
                                    'url' => 'https://cdn.corporatefinanceinstitute.com/assets/finance-definition.jpg',
                                ],
                                'caption' => 'Random Image Caption',
                                'stretched' => false,
                                'withBackground' => false,
                            ],
                        ],
                    ],
                    'version' => '2.22.2',
                ]);
            case 'audio':
                return json_encode([ // This case is already correct
                    'time' => time(),
                    'blocks' => [
                        [
                            'type' => 'audio',
                            'data' => [
                                'file' => [
                                    'url' => 'resources/Lekcii_mp3/test.m4a',
                                ],
                                'caption' => 'Random Audio Caption',
                            ],
                        ],
                    ],
                    'version' => '2.22.2',
                ]);
            default:
                return '';
        }
    }
}

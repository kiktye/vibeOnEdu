<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LectureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'course' => $this->course->name,
            'description' => $this->description,
            'duration' => $this->duration,
            'module' => $this->course->module->name,
            'courseDescription' => $this->course->description
        ];
    }
}

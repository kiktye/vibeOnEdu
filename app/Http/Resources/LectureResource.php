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

        // return parent::toArray($request);

        $decodedContent = json_decode($this->content, true);

        return [
            'id' => $this->id,
            'courseName' => $this->course->name,
            'lectureName' => $this->name,
            'description' => $this->description,
            'content' => $decodedContent,
            'audioPath' => $this->audio_path,
            'duration' => $this->duration,
        ];
    }
}

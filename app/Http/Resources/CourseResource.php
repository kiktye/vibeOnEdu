<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);


        return [
            'id' => $this->id,
            'courseName' => $this->name,
            'description' => $this->description,
            'moduleName' => $this->module->name,
            // 'finishedLectures' => $this->finishedLectures,
            'lectures' => LectureResource::collection($this->lectures),
            // 'evaluations' => EvaluationResource::collection($this->evaluations),
            // 'certificates' => CertificateResource::collection($this->certificates)
        ];
    }
}

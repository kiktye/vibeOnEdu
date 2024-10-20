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
            'name' => $this->name,
            'description' => $this->description,
            'module' => $this->module->name,
            'moduleDescription' => $this->module->description,
            'users' => UserResource::collection($this->users),
            'lectures' => LectureResource::collection($this->lectures),
            'evaluations' => EvaluationResource::collection($this->evaluations),
            'certificates' => CertificateResource::collection($this->certificates)

        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'lastLoginAt' => $this->last_login_at,
            'badges' => BadgeResource::collection($this->whenLoaded('badges')),
            'courses' => CourseResource::collection($this->whenLoaded('courses')),
            'evaluations' => EvaluationResource::collection($this->whenLoaded('evaluations')),
            'topics' => TopicResource::collection($this->whenLoaded('topics')),
            'lectures' => LectureResource::collection($this->whenLoaded('lectures')),
            'userInfo' => new UserInfoResource($this->whenLoaded('userInfo')),
            'certificates' => CertificateResource::collection($this->whenLoaded('certificates')),
            'role' => new RoleResource($this->whenLoaded('role')),
        ];
    }
}

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

            // Safely check if additional data is set and provide default values if not
            'lastAchievedBadge' => isset($this->additional['lastAchievedBadge'])
                ? new BadgeResource($this->additional['lastAchievedBadge'])
                : null,  // Default to null if not provided

            'AllBadgesAchieved' => isset($this->additional['AllBadgesAchieved'])
                ? BadgeCollection::make($this->additional['AllBadgesAchieved'])
                : BadgeCollection::make([]),  // Default to empty collection

            'coursesInProgress' => isset($this->additional['coursesInProgress'])
                ? BadgeCollection::make($this->additional['coursesInProgress'])
                : BadgeCollection::make([]),  // Default to empty collection

            'finishedCourses' => isset($this->additional['finishedCourses'])
                ? BadgeCollection::make($this->additional['finishedCourses'])
                : BadgeCollection::make([]),  // Default to empty collection

            'evaluations' => EvaluationResource::collection($this->whenLoaded('evaluations')),
            'topics' => TopicResource::collection($this->whenLoaded('topics')),
            'lectures' => LectureResource::collection($this->whenLoaded('lectures')),
            'userInfo' => new UserInfoResource($this->whenLoaded('userInfo')),
            'certificates' => CertificateResource::collection($this->whenLoaded('certificates')),
            'role' => new RoleResource($this->whenLoaded('role')),
        ];
    }
}

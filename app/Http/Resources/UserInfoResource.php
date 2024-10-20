<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserInfoResource extends JsonResource
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
            'userName' => $this->user->name,
            'userSurname' => $this->user->surname,
            'city' => $this->city->name,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'birthDate' => $this->birth_date,
            'image' => $this->image_path,
            'studyTime' => $this->study_time,
        ];
    }
}

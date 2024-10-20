<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MaterialResource extends JsonResource
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
            'lecture' => $this->lecture->name,
            'type' => $this->type,
            'content' => $decodedContent,
        ];
    }
}

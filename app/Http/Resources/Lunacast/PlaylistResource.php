<?php

namespace App\Http\Resources\Lunacast;

use Illuminate\Http\Resources\Json\JsonResource;

class PlaylistResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => [
                'formatted' => number_format($this->price, 0, ',','.'),
                'raw' => $this->price
            ],
            'instructor' => $this->user,
            'total_episode' => $this->videos_count,
            'thumbnail' => $this->picture
        ];
    }
}

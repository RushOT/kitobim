<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SimpleBookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' =>$this->title,
            'price' => $this->price,
            'year' => $this->year,
            'cover' => $this->cover,
            'epub' => $this->epub,
            'rating' => $this->rating,
            'is_pinned' => $this->is_pinned,
            'relationships' => [
                'authors' => SimpleAuthorResource::collection($this->authors),
                'genres' => SimpleGenreResource::collection($this->genres),
            ]
        ];
    }
}

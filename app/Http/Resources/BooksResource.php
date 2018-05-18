<?php

namespace App\Http\Resources;

use App\Author;
use Illuminate\Http\Resources\Json\JsonResource;

class BooksResource extends JsonResource
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
            'annotation' => $this->annotation,
            'price' => $this->price,
            'isbn' => $this->isbn,
            'year' => $this->year,
            'related_id' => $this->related_book_id,
            'script' => $this->script,
            'cover' => $this->cover,
            'epub' => $this->epub,
            'rating' => $this->rating,
            'is_pinned' => $this->is_pinned,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'authors' => SimpleAuthorResource::collection($this->authors),
            'genres' => GenreResource::collection($this->genres),
        ];
    }
}

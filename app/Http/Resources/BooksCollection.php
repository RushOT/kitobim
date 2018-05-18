<?php

namespace App\Http\Resources;

use App\Book;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BooksCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
/*            'count' => $this->collection->count(),*/
            'data' => SimpleBookResource::collection($this)
            ];
    }
}

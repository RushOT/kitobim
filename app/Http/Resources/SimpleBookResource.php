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

        $i=0;

        foreach ($this->authors as $authr){
            $authrs[$i++] = $authr->name;
        }

        $i=0;

        foreach ($this->genres as $genr){
            $genrs[$i++] = $genr->name;
        }

        if(empty($this->cover)){
            $coverpic = $this->cover;
        }else{
            $coverpic = "http://development.baysoftware.ru/".$this->cover;
        }

        return [
            'id' => $this->id,
            'title' =>$this->title,
            'price' => $this->price,
            'cover' => $coverpic,
            'rating' => $this->rating,
            'authors' => $authrs,
            'genres' => $genrs,

        ];
    }
}

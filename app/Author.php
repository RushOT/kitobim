<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class Author extends Model
{

    public function genres(){
        return $this->belongsToMany(Genre::class);
    }

    public function books(){
        return $this->belongsToMany(Book::class);
    }
}

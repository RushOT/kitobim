<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $checked;

    public function authors(){
        return $this->belongsToMany(Author::class);
    }

    public function books(){
        return $this->belongsToMany(Book::class);
    }

}

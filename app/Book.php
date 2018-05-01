<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    public function publisher(){

        return $this->belongsTo(Publisher::class);
    }

    public function collections(){
        return $this->belongsToMany(Collection::class);
    }

    public function genres(){
        return $this->belongsToMany(Genre::class);
    }

    public function authors(){
        return $this->belongsToMany(Author::class);
    }
}

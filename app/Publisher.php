<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    public function books(){

        return $this->hasMany(Book::class);
    }

    public function magazines(){
        return $this->hasMany(Magazine::class);
    }
}

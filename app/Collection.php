<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    public $checked;

    public function books(){
        return $this->belongsToMany(Book::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    public function issues(){
        return $this->hasMany(Issue::class);
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }
}

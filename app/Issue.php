<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    public function magazine(){
        return $this->belongsTo(Magazine::class);
    }
}

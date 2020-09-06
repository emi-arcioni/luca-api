<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function videos() {
        return $this->belongsToMany(Video::class);
    }
}

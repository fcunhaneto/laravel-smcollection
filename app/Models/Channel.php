<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public function titles()
    {
        return $this->belongsToMany(Title::class)->withTimestamps();
    }
}
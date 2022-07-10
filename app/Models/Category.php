<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    public function titles()
    {
        return $this->belongsToMany(Title::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'title_user','title_id', 'user_id')
            ->withPivot('id', 'user_rating', 'user_channel', 'user_status', 'last_season', 'last_episode', 'user_trash')
            ->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function channels()
    {
        return $this->belongsToMany(Channel::class)->withTimestamps();;
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }
}

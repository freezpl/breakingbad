<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Character extends BaseModel
{
    protected $fillable = [
        'name', 'birthday_date', 'occupations', 'photo', 'nickname', 'portrayed'
    ];

    public function episodes()
    {
        return $this->belongsToMany('App\Models\Episode', 'episode_character');
    }

    public function quotes()
    {
        return $this->hasMany('App\Models\Quote','character_id');
    }
}

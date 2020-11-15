<?php

namespace App\Models;
use App\Models\Base\BaseModel;

class Episode extends BaseModel
{
    protected $fillable = [
        'title', 'air_date'
    ];

    public function characters()
    {
        return $this->belongsToMany('App\Models\Character', 'episode_character');
    }

    public function quotes()
    {
        return $this->hasMany('App\Models\Quote', 'episode_id');
    }

}

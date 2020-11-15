<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Quote extends BaseModel
{
    protected $fillable = [
        'quote', 'character_id', 'episode_id'
    ];

    public function character()
    {
        return $this->belongsTo('App\Models\Character', 'character_id');
    }

    public function episode()
    {
        return $this->belongsTo('App\Models\Episode', 'episode_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'romm_id', 'user_id',
    ];

    public function users() {
        $this->belongsToMany(User::class);
    }
}

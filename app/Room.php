<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'description', 'name',
    ];

    public function users() {
        $this->belongsToMany(User::class);
    }
}

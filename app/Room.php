<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'description', 'name',
    ];

    public function users() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }


    public function messages() {
        return $this->hasMany(Message::class);
    }

}

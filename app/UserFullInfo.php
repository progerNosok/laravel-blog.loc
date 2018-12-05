<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFullInfo extends Model
{
    protected $fillable = [
        'user_id', 'status', 'country', 'city', 'about', 'hobbies'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

}

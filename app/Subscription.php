<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public function subscribe($email)
    {
        $sub = new self;
        $sub->email = $email;
        $sub->token = str_random(100);
        $sub->save();

        return $sub;
    }
}

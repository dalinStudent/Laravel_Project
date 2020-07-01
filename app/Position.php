<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public function users() {
        return $this->hasOne(User::class);
    }
}

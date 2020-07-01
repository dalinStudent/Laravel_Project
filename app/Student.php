<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Student extends Model
{
    public function comments() {
        return $this->hasMany(Comment::class);
    }
}

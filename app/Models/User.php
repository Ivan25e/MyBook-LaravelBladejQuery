<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function books()
    {
        return $this->hasMany('App\Models\UserCourse', 'author_id');
    }
}

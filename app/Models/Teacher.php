<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name',
        'role',
        'subject',
        'email',
        'dob',
        'password',
    ];

    protected $hidden = ['password'];
}

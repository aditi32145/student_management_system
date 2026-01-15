<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'roll_no',
        'name',
        'degree',
        'phone',
        'dob',
        'email',
        'password',
        'start_date',
        'end_date'
    ];
    protected $hidden=['password'];
}

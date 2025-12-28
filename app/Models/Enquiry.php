<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Enquiry extends Model
{
    protected $table = 'stmn';


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'country',
        'address',
        'state',
        'enquiry'
    ];
}



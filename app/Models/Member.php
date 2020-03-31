<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = "members";
    //
    protected $fillable =[
		'library_id',
		'first_name',
		'middle_name',
		'last_name',
		'date_of_birth',
		'gender',
		'street',
		'city',
		'country',
		'phone_number',
		'email',
		'valid_from',
		'valid_till',
		'photo',
    ];
}
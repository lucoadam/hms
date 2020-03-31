<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idcard extends Model
{
    protected $table = "idcards";
    //
    protected $fillable =[
		'member_type',
		'institute',
		'faculty_designation',
		'batch_joined_year',
		'serial_number',
    ];
}
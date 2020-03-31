<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookcallnumber extends Model
{
    protected $table = "bookcallnumbers";
    //
    protected $fillable =[
		'call_number',
		'description',
    ];
}
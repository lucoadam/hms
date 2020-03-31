<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Callnumber extends Model
{
    protected $table = "callnumbers";
    //
    protected $fillable =[
		'branch_id',
		'callnumber',
		'description',
    ];
}
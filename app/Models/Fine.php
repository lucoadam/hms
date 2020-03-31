<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    protected $table = "fines";
    //
    protected $fillable =[
		'branch_id',
		'max_days',
		'fine_amount',
		'membertype_id',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budgetallocation extends Model
{
    protected $table = "budgetallocations";
    //
    protected $fillable =[
		'branch_id',
		'department_id',
		'amount',
    ];
}
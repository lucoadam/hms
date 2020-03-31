<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masterbudget extends Model
{
    protected $table = "masterbudgets";
    //
    protected $fillable =[
		'branch_id',
		'start_fiscal_date',
		'end_fiscal_date',
		'budget_id',
		'total_budget',
		'comments',
    ];
}
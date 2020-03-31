<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    protected $table = "thesiss";
    //
    protected $fillable =[
		'branch_id',
		'd_account_number',
		'writer',
		'title',
		'subject',
		'department_id',
		'university',
		'pages',
		'year',
		'cd',
    ];
}
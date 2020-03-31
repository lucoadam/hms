<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facultydesignation extends Model
{
    protected $table = "facultydesignations";
    //
    protected $fillable =[
		'branch_id',
		'name',
		'fullabbrevation',
		'abbrevation',
    ];
}
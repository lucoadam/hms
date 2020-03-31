<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "suppliers";
    //
    protected $fillable =[
		'branch_id',
		'name',
		'street',
		'city',
		'country',
		'phone',
		'fax',
		'email',
		'contact_name',
		'contact_designation',
		'contact_phone',
		'contact_mobile',
		'contact_email',
		'description',
    ];
}
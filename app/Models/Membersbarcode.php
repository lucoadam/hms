<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membersbarcode extends Model
{
    protected $table = "membersbarcodes";
    //
    protected $fillable =[
		'library_id',
		'designation_id',
		'barcode',
    ];
}
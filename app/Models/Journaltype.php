<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journaltype extends Model
{
    protected $table = "journaltypes";
    //
    protected $fillable =[
		'type',
		'description',
    ];
}
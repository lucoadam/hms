<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membercategory extends Model
{
    protected $table = "membercategorys";
    //
    protected $fillable =[
		'category',
		'full_abbreviation',
		'id_card_abbreviation',
    ];
}
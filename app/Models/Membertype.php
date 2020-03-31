<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membertype extends Model
{
    protected $table = "membertypes";
    //
    protected $fillable =[
		'name',
		'full_abbreviation',
		'id_card_abbreviation',
    ];
}
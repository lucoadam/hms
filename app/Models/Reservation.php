<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = "reservations";
    //
    protected $fillable =[
		'branch_id',
		'member_id',
		'edition_id',
		'reservation_date',
		'for_date',
		'status',
		'remarks',
    ];
}
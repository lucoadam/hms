<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookcategory extends Model
{
    protected $table = "bookcategorys";
    //
    protected $fillable =[
		'category',
		'parent_id',
    ];
}
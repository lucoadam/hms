<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accession extends Model
{
    protected $table = "accessions";
    //
    protected $fillable =[
		'branch_id',
		'accession_number',
		'bstype_id',
		'book_source',
		'book_status',
		'book_id',
		'edition_id',
		'zone_id',
		'location_id',
    ];
}
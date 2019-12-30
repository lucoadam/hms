<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    //
    protected $table = 'notices';

    protected $fillable = [
        'title',
        'content',
        'publishedDate'
    ];
}

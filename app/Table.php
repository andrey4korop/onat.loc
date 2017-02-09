<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
    protected $casts = [
        'table' => 'array',
    ];
    protected $dates = ['deleted_at'];
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
    use SoftDeletes;

    protected $casts = [
        'table' => 'array',
    ];
    
    protected $dates = ['deleted_at'];
    
}

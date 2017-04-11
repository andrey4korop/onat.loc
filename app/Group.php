<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['group_name'];

    public function students()
    {
        return $this->hasMany('App\Student','group_id','id')->orderBy('FIO');
    }
}

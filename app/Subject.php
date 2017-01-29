<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $timestamps = false;

    protected $fillable = ['subject'];
    //
    public function norm()
    {
        return $this->hasMany('App\Norm','id_subject','id');
    }
}

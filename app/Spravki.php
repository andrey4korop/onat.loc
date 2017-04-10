<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spravki extends Model
{
    public function type()
    {
        return $this->hasOne('App\TypeSpravki','id','id_type');
    }
    public function student(){
        return $this->belongsTo('App\User', 'id_student', 'id');
    }
}

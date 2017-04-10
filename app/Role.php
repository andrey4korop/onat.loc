<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    public function leftMenu()
    {
        return $this->hasMany('App\LeftMenu','id_role','id');
    }
}

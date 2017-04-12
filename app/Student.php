<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Student extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['FIO'];

    public function group(){
        return $this->belongsTo('App\Group', 'group_id', 'id');
    }
    public function oplata()
    {
        return $this->hasOne('App\Oplata','student_id','id');
    }
}

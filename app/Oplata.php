<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Oplata extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'oplata';

    public function student(){
        return $this->belongsTo('App\Studdent', 'student_id', 'id');
    }
}

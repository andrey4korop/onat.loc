<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['firstName', 'name', 'surname'];
    protected $hidden = ['poseysaemosts'];



    public function group(){
        return $this->belongsTo('App\Group', 'group_id', 'id');
    }
    public function groupForPoselenie(){
        return $this->belongsToMany('App\GroupForPoselenie', 'group_student', 'student_id', 'group_id');
    }
    public function oplata()
    {
        return $this->hasOne('App\Oplata','student_id','id');
    }
    public function poseysaemosts($dates = [])
    {

        foreach($dates as $data){
            $this->hasMany('App\Poseyshaemost','student_id','id')->firstOrCreate(['data' => $data]);
        }
        return $this->hasMany('App\Poseyshaemost','student_id','id');
    }

}

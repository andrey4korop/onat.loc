<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class GroupForPoselenie extends Model
{
    protected $dates = ['deleted_at'];
    protected $fillable = ['name'];

    public function students(){
        return $this->belongsToMany('App\Student', 'group_student', 'group_id', 'student_id')->withPivot('type_poselenia', 'oplata', 'comentary', 'zayava', 'nakaz', 'hz')->orderBy('firstName');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Subject extends Model
{
    use SoftDeletes;
    public $timestamps = false;

    protected $fillable = ['subject'];

    protected $dates = ['deleted_at'];

    public function norm()
    {
        return $this->hasMany('App\Norm','id_subject','id');
    }
}

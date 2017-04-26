<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['group_name'];
    protected $hidden = ['days'];
    public function students()
    {
        return $this->hasMany('App\Student','group_id','id')->orderBy('FIO');
    }

    public function days($dayM = null)
    {
        if($dayM != null) {

            $dayMM = Carbon::createFromFormat('Y-m-d', $dayM)->startOfWeek();
            for($i=0;$i<6;$i++)
            {


                $this->hasMany('App\Day_group_subject', 'group_id', 'id')->firstOrCreate(['data' => $dayMM->toDateString(), 'nweek' => $dayMM->year .'-'.$dayMM->weekOfYear ]);
                $dayMM->addDay();
            }
        }


        return $this->hasMany('App\Day_group_subject', 'group_id', 'id');
    }


}

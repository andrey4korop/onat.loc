<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','login',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function table()
    {
        return $this->hasMany('App\Table','user_id','id');
    }

    public function spravki()
    {
        return $this->hasMany('App\Spravki','id_student','id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_role', 'id_user', 'id_role');
    }

}

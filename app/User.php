<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

use Notifiable;

	protected $fillable = [
        'empID', 'email', 'password',
    ];



public function employee(){
    return $this->belongsTo('App\Emp', 'empID');
}

/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //
}


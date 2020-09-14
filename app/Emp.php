<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emp extends Model
{
    	 protected $fillable = [
        'fname','lname', 'fathername','dob','phone', 'mobile','email','position','degree',
    ];
    
    
    public function user(){
        return $this->hasOne('App\User');
    }
}

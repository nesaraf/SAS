<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{


	protected $fillable = [
        'name','last_name','company','phone','email','address',
    ];
    //

    public function sale()
    {
    	# code...
    	return $this->hasMany('App\sale');  
    }
}

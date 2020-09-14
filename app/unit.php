<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class unit extends Model
{
   
   protected $fillable = [
        'name',
         ]; //

      public function product()
    {
    	# code...
    	return $this->hasMany('App\product');  
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
   protected $fillable = [
        'order_no','customer_id','date','total',
    ];

    public function customer()
    {
    	# code...
    	return $this->belongsTo('App\customer');
    }

     public function sales_detail()
    {
    	# code...
    	return $this->hasMany('App\sales_detail');
    }

    






}

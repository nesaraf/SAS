<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{



	 protected $fillable = [
        'barcode','name', 'commercial_name','category_id','exp_date', 'purchase_price','sales_price','manufaturer','amount','unit_id','image',
    ];
    //
    public function category()
    {
    	# code...
    	return $this->belongsTo('App\category');
    }


     public function unit()
    {
        # code...
        return $this->belongsTo('App\unit');
    }

    public function sales_detail(){
        return $this->hasMany('App\sales_detail');
 

    }

    public function sale(){
        return $this->hasMany('App\sale');
 

    }

}

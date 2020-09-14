<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sales_detail extends Model
{
    protected $fillable = [
        'sales_id','product_id','customer_id','quantity','unit_price','total_price',
    ];

    public function sale()
    {
    	# code...
    	return $this->belongsTo('App\sale');
    }



    public function product(){
        return $this->belongsTo('App\product');
    }
}

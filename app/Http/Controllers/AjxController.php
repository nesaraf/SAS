<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\category;
use App\unit;

class AjxController extends Controller
{


    //

    function updateAmount($barcode, $amount){

		$product  = product::where('barcode', $barcode)->get();
		foreach ($product as $pro){
         $calcAmount = $pro->amount-$amount;
		
		     if($calcAmount){
		     	$pro->amount = $calcAmount;
		     	$pro->save();
		     }
}
  }



}

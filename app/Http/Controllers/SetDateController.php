<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\category;
use App\unit;

class SetDateController extends Controller
{

	  function updateAmount(){

		$product  = product::all();
		foreach ($product as $pro){
       
		
		    
		     	$pro->exp_date = "";
		     	$pro->save();
		}   
    //
}
}

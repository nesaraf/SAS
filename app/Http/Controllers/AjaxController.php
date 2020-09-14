<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\category;
use App\unit;

class AjaxController extends Controller
{

	function index($barcode){
		
		$products = product::with('category','unit')->where('barcode',$barcode)->get();
    
      return response()->json(array('msg'=> $products), 200);
  }


  function sold($barcode){
  	
  }


  
   }  //


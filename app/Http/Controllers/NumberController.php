<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\number;


class NumberController extends Controller
{	


	  function updateAmount(){
	   $id = 1;
	  	$number  = number::where('id',$id)->get();

		

		    	foreach($number as $num){
		     	$number1 = $num->number;
		     	$calcnum = $num->number+1;
		     	$num->number = $calcnum;
		     	$num->save();
		     	return $number1;
		     }		     
      }

    function getNumber(){

    	  $id = 1;
    	$numbers  = number::where('id',$id)->get();
          
            foreach($numbers as $num){
          
    	return $num->number;

    }


    }
  }
    //


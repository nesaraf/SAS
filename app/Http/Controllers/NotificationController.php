<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

class NotificationController extends Controller
{
	public function criexpdate()
	{






		//$pro = product::where('exp_date', '<',183 )->get();
		$products = product::all();


	return view('notifications.critical-exp-date',compact('products'));
	}


	public function lowexpdate(){

			$products = product::all();


	return view('notifications.low-exp-date',compact('products'));


	}


	public function lowamount(){

			$products = product::all();


	return view('notifications.low-amount',compact('products'));


	}

	



}

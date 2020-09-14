<?php

namespace App\Http\Controllers;

use  App\sales_detail;
use Illuminate\Http\Request;
use  App\product;


class AddSalesDetailController extends Controller
{
    //


    function index($barcode, $amount,$bill_no){
    	$id ="";
    	$price = 0;
    	$amt = $amount;

		$product  = product::where('barcode', $barcode)->get();
		foreach ($product as $pro){
         $id = $pro->id;
         $price = $pro->sales_price;
		     };

		       $sale_detail = new sales_detail;
		       $sale_detail->sales_id = $bill_no;
		       $sale_detail->product_id = $id;
		       $sale_detail->quantity= $amt;
		       $sale_detail->unit_price = $price;
		       $sale_detail->total_price = $price*$amt;
		       $sale_detail->discount = 0;
		       $sale_detail->net_price = $price*$amt;
		       $sale_detail->save();
		
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\product;
use App\sales_detail;
use App\sale;
use Session;

class SaleDetailController extends Controller
{
          public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

      
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $Iid = sale::orderBy('id', 'desc')->first();
    $Lid = $Iid->id+1;

         $customers = customer::all();
         $products = product::all();
      return view('sales_detail.add_invoice_items22',compact('customers','products','Lid'));  //


}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $products = product::all();
        $sales = sale::where('bill_no',$id)->get();
        $sale_details = sales_detail::where('sales_id',$id)->get();
        
        return view('sales_detail.show_details',compact('sale_details','products','sales'));



           
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

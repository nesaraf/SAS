<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use App\customer;
use App\product;
use App\sales_detail;
use App\sale;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pdf = PDF::loadView('pdf');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        // $products = product::all();
         $sales = sale::with('customer')->where('bill_no',$id)->get();
        $bill_no = $id;
        $sale_details = sales_detail::with('product')->where('sales_id',$id)->get();
//        var_dump($sale_details);

        // foreach ( $sale_details as $key) {
              // $sale_id = $key;  # code...
            // return $key;
           // }
          
        return view('sales_detail.pdf',compact('sale_details','sales'));
        
//         return $pdf->setPaper('a4', 'portrait')->stream('sales_detail.pdf');
            
       





         // return $pdf->download('salse_detail.pdf');

       // $pdf = PDF::loadView('sales_detail.pdf',compact('sale_details','products','sales'));
       // return $pdf->download('invoice.pdf');
        // return view('sales_detail.pdf',compact('sale_details','products','sales'));

         // return view('sales_detail.pdf')
        


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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

    public function login(){
         
        return view('login');
    }
}

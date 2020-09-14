<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\product;
use App\sale;
use App\sales_detail;
use Session;

class SaleController extends Controller
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
    public function index()
    {

   
        $sales = sale::all();
        $products = product::all();
        return view('sales.invoices_list',compact('products','sales'));

    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $Iid = sale::order_by('upload_time', 'desc')->first();

   
        $customers = customer::all();

        return view('sales.add_invoice',compact('customers'));//

 

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
        $p_id = '';
        $quantity = '';
        $bill_no = $request->order_no;
        $customer = $request->customer;
        if(count($request->item_name)>1){
            foreach($request->item_name as $item=>$v){
              $p_id = $request->PID[$item];
                $quantity = $request->order_item_quantity[$item];
              $sales = array(
              'sales_id' => $bill_no,
               'product_id' => $request->PID[$item],
               'customer_id' => $customer,
               'quantity' => $request->order_item_quantity[$item],
               'unit_price' => $request->order_item_unit_price[$item],
               'total_price' => $request->order_item_total_price[$item],
              ); 
                sales_detail::insert($sales);
                $prod = product::find($p_id);
                $updateAmount = $prod->amount-$quantity;
               $prod->update(['amount'=> $updateAmount]);
                
            }
            
            
            
//         echo $sales["sales_id"].", ".$sales["product_id"].", ".$sales["customer_id"].", ".$sales["quantity"].",  ".$sales["unit_price"].", ".$sales["total_price"].'<br>';
  
        }

         $this->validate($request,[
        'order_no'=>'required',
        'customer'=>'required',
        'order_date'=>'required',
//        'final_total_amt'=>'required',
       ]);


       $sale  = new sale;
       $sale->bill_no = $request->order_no;
       $sale->customer_id = $request->customer;
       $sale->date= $request->order_date;
       $sale->total = 3534;
       $sale->save();
       return redirect(route('sale.index'));
       
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

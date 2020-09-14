<?php

namespace App\Http\Controllers;

use App\customer;
use App\sale;
use App\product;
use Session;


use Illuminate\Http\Request;

class CustomerController extends Controller
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

      
        $products = product::all();

        $customers = customer::all();
        return view('customers.show_customer',compact('customers','products'));

    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    
        $products = product::all();
        return view('customers.add_customer',compact('products'));
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[

        'customerName'=>'required',
        'lastName'=>'required',
        'pharmacy'=>'required',
        'phone'=>'required',
        'address'=>'required',

       ]);

       $customer  = new customer;
       $customer->name = $request->customerName;
       $customer->last_name = $request->lastName;
       $customer->company = $request->pharmacy;
       $customer->phone = $request->phone;
        $customer->email = $request->email;
       $customer->address = $request->address;

       $customer->save();
       return redirect(route('customer.index'));



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

        $customers = customer::where('id',$id)->first();
        return view('customers.update_customer',compact('customers','products'));
   
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
       $this->validate($request,[

        'customerName'=>'required',
        'lastName'=>'required',
        'pharmacy'=>'required',
        'phone'=>'required',
        'address'=>'required',

       ]);

       $customer  =customer::find($id);
       $customer->name = $request->customerName;
       $customer->last_name = $request->lastName;
       $customer->company = $request->pharmacy;
       $customer->phone = $request->phone;
       $customer->email = $request->email;
       $customer->address = $request->address;

       $customer->save();
       return redirect(route('customer.index')); //
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        customer::where('id',$id)->delete();
        return redirect()->back();//
    }
}

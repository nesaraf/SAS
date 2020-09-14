<?php

namespace App\Http\Controllers;

use App\unit;
use App\product;
use Session;

use Illuminate\Http\Request;

class UnitController extends Controller
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

         $units = unit::all();
         return view('units.show_unit',compact('units','products'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         
            $products = product::all();
       return view('units.add_unit',compact('products')); 
    
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

        'name'=>'required'

       ]);

       $unit = new unit;
       $unit->name = $request->name;
       $unit->save();

       return redirect(route('unit.index'));
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
         $units = unit::where('id',$id)->first();
        return view('units.update_unit',compact('units','products'));

   
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

        'name'=>'required'

       ]);

       $unit = unit::find($id);
       $unit->name = $request->name;
       $unit->save();

       return redirect(route('unit.index'));
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
       unit::where('id',$id)->delete();
        return redirect()->back(); //
    }
}

<?php

namespace App\Http\Controllers;

use App\category;

use Illuminate\Http\Request;
use App\product;
use Session;

class CategoryController extends Controller
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

        $categories = category::all();
         return view('categories.show_category',compact('categories','products'));
  
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
            $products = product::all();
        return view('categories.add_category',compact('products'));
   
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

       $category = new category;
       $category->name = $request->name;
       $category->save();

       return redirect(route('category.index'));
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
         $categories = category::where('id',$id)->first();
        return view('categories.update_category',compact('categories','products'));//
 
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

       $category =category::find($id);
       $category->name = $request->name;
       $category->save();

       return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      category::where('id',$id)->delete();
        return redirect()->back();//  //
    }
}

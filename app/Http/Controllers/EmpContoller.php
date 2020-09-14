<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Emp;
class EmpContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $emps = Emp::all();
       return view('Employee.employee',compact('emps'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return view('Employee.Addemployee');
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
         'fname'=>'required',
        'lname'=>'required',
        'fathername'=>'required',
        'dob'=>'required',
        'phone'=>'required',
        'mobile'=>'required',
        'email'=>'required',
        'degree'=>'required',
        'position'=>'required',
       ]);
           
        // if($request->hasFile('image')){
        //   $filename = $request->file('image')->getClientOriginalName();
        //    $save = $request->image->storeAs('public/images',$filename);
        //   };
        
    
       $emp  = new Emp;
       $emp->fname = $request->fname;
       $emp->lname = $request->lname;
       $emp->fathername = $request->fathername;
       $emp->dob = $request->dob;
       $emp->phone= $request->phone;
       $emp->mobile = $request->mobile;
       $emp->email = $request->email;
       $emp->degree = $request->degree;
       $emp->position = $request->position;
       // $product->unit_id = $request->unit;
       // $product->image = $filename;

       $emp->save();
       return redirect(route('employee.index'));
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
    
    public function find($id)
    {
       $emp = Emp::find($id);
     return  Response()->json([
         'emps'=>$emp,

                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $emp = Emp::find($id);

    ;
        
        return  Response()->json([
         'emps'=>$emp,

                ]);
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
        $emp=Emp::findOrFail($request->id);
        $emp->fname = $request->fname;
       $emp->lname = $request->lname;
       $emp->fathername = $request->fathername;
       $emp->dob = $request->dob;
       $emp->phone= $request->phone;
       $emp->mobile = $request->mobile;
       $emp->email = $request->email;
       $emp->degree = $request->degree;
       $emp->position = $request->position;
        
       if($emp->save()){
            return response($emp);
    }
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

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\product;
use App\category;
use App\unit;
use Session;

class UserController extends Controller
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
    public function index(request $request)
    {
    // 

        
            $users = user::with('employee')->get();
             return view('users.user_list',compact('users'));



    }

       
        //
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       

         return view('users.add_user');




    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response


     $table->string('last_name');
            $table->string('user_name')->unique();
            $table->string('phone')->unique();
            $table->string('email');
            $table->string('password');
            $table->integer('role');
            $table->string('photo');
     */
    public function store(Request $request)
    {

        

      $this->validate($request,[
        
        'name'=>'required',
        'lastName'=>'required',
         'userName'=>'required',
          'password'=>'required',
        
       ]);
           
        if($request->hasFile('image')){
          $filename = $request->file('image')->getClientOriginalName();
           $save = $request->image->storeAs('public/images',$filename);
          };

          
    
       $users  = new user;
      
       $users->name = $request->name;
       $users->last_name = $request->lastName;
       $users->user_name = $request->userName;
       $users->phone = $request->phone;
       $users->email = $request->email;
       $users->password = $request->password;
       $users->role = $request->role;
       $users->photo = $filename;
       $users->save();
       return redirect(route('user.index'));
    }
  
        //
    

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

        if (Session::has('login')) {}

            else
                return view('login');
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



    public function login(request $request){

        // return response($request->all());
        $user_name = $request->user;
        $password =  $request->pass;
        $user=user::where('user_name',$user_name)->where('password',$password)->get();
        session()->put('login', 'success');
        return "success";



    }

    public function logout(){
       Session::forget('login');
      return view('login');


        }
}

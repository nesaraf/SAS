<?php

namespace App\Http\Controllers;
use App\product;
use App\category;
use App\unit;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Emp;
use Auth;
//use Session;

use Illuminate\Http\Request;

class ProductController extends Controller
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
//        $user= User::with('employee')->where('id',Auth::user()->id)->get();
//           echo $user[0];
         $products = product::with('category','unit')->get();
         return view('products.pList',compact('products'));

  
 }
    
      
   
	public function LoadData(Request $request){
		//print_r($request->all());
		$columns = array(
            
          0  => "barcode",
				  1  => "name",
					2  => "commercial_name",
					3  => "exp_date",
					4  => "purchase_price",
					5  => "sales_price",
					6  => "category_id",
					7  => "manufacturer",
					8  => "amount",
					9  => "unit_id",
					10 => "image",
					11 => "action",
		);
		
		$totalData = product::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$posts = product::offset($start)
					->limit($limit)
					->orderBy($order,$dir)
					->get();
			$totalFiltered = product::count();
		}else{
			$search = $request->input('search.value');
			$posts = product::with('category','unit')->where('name', 'like', "%{$search}%")
							->orWhere('barcode','like',"%{$search}%")
							->orWhere('exp_date','like',"%{$search}%")
							->offset($start)
							->limit($limit)
							->orderBy($order, $dir)
							->get();
			$totalFiltered = product::with('category','unit')->where('name', 'like', "%{$search}%")
							->orWhere('barcode','like',"%{$search}%")
							->orWhere('exp_date','like',"%{$search}%")
							->count();
		}		
					
		
		$data = array();
		
		if($posts){
			foreach($posts as $r){
                
				$nestedData['barcode'] = $r->barcode;
				$nestedData['name'] = $r->name;
				$nestedData['commercial_name'] = $r->commercial_name;
				$nestedData['exp_date'] =  date('d-m-Y H:i:s',strtotime($r->exp_date));
				$nestedData['purchase_price'] = $r->purchase_price;
				$nestedData['sales_price'] = $r->sales_price;
				$nestedData['category'] = $r->category->name;
				$nestedData['manufacturer'] = $r->manufaturer;
				$nestedData['amount'] = $r->amount;
				$nestedData['unit'] = $r->unit->name;
				$nestedData['image'] = '<img src="http://127.0.0.1:8000/storage/images/'.$r->image.'" height="25px" width = "25px"/>';
				$nestedData['action'] = '
                        <div class="dropdown">
                        <a class = "label label-info" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                        <span class="caret"></span>
                        </a>
                        <ul class="action-Dd dropdown-menu">
                        <li><a style = "color:#007bff" data-toggle="modal" data-target=".Details-modal" onclick="getEditData('.$r->id.')"><span class="glyphicon glyphicon-list-alt"></span>&nbsp; Details</a></li>
                        <li><a style = "color:#ffc107" data-toggle="modal" data-target=".Edit-modal" onclick="getEditData('.$r->id.')"><span class="glyphicon glyphicon-pencil"></span>&nbsp; Edit</a></li>
                        <li><a style = "color:#dc3545"  onclick="setDeleteId('.$r->id.')"><span class="glyphicon glyphicon-trash"></span>&nbsp; Delete</a></li>
                        </ul>
                        </div>
				';
				$data[] = $nestedData;
			}
		}
		
		$json_data = array(
			"draw"			=> intval($request->input('draw')),
			"recordsTotal"	=> intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data"			=> $data
		);
		
		echo json_encode($json_data);
	}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = category::all();
        $units = unit::all();
        $products = product::all();
        return view('products.add_product',compact('categories','units','products'));
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

         $this->validate($request,[
         'barcode'=>'required',
        'name'=>'required',
        'commercial_name'=>'required',
        'category'=>'required',
        'purchase_price'=>'required',
        'sales_price'=>'required',
        'exp_date'=>'required',
        'amount'=>'required',
        'unit'=>'required',
        'manufaturer'=>'required',
        'image'=>'required',

       ]);
           
        if($request->hasFile('image')){
          $filename = $request->file('image')->getClientOriginalName();
           $save = $request->image->storeAs('public/images',$filename);
          };
        
    
       $product  = new product;
       $product->barcode = $request->barcode;
       $product->name = $request->name;
       $product->commercial_name = $request->commercial_name;
       $product->category_id = $request->category;
       $product->exp_date = $request->exp_date;
       $product->purchase_price = $request->purchase_price;
       $product->sales_price = $request->sales_price;
       $product->manufaturer = $request->manufaturer;
       $product->amount = $request->amount;
       $product->unit_id = $request->unit;
       $product->image = $filename;

       $product->save();
       return redirect(route('product.index'));
 
       
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
        $categories = category::all();
        $units = unit::all();
        // $products = product::where('id',$id)->first();
      $products = product::with('category','unit')->where('id',$id)->get();

    ;
        
        return  Response()->json([
         'products'=>$products,
         'categories'=>$categories,
         'units'=>$units,
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
          if($request->file('file')){
      
            $imageName = $request->image->storeAs('public/images',$filename);
              return $imageName;

           }else{
              return 'nothig in request';
          }
        
       
    }
    
    
        
 public function update(Request $request)
    {
      
     $imagename = '';
     if ($request->hasFile('picture')){
         $imagename= $request->picture->getClientOriginalName();
         $request->picture->storeAs('public/images',$imagename);
     }else{
         $imagename = $request->filename;
     }
       $product=product::findOrFail($request->id);
       $product->barcode = $request->barcode;
       $product->name = $request->name;
       $product->commercial_name = $request->commercial_name;
       $product->category_id = $request->category;
       $product->exp_date = $request->exp_date;
       $product->purchase_price = $request->purchase_price;
       $product->sales_price = $request->sales_price;
       $product->manufaturer = $request->manufaturer;
       $product->amount = $request->amount;
       $product->unit_id = $request->unit;
       $product->image = $imagename;
        
       if($product->save()){
            return response($product);
        }
//            product::where('id', $id)->update(['barcode' =>$bc ,'name'=>$pn,'commercial_name'=>$cn,'category_id'=>$cid,'exp_date'=>$exp,'purchase_price'=>$pp,'sales_price'=>$sp,'manufaturer'=>$sazenda,'amount'=>$am,'unit_id'=>$uid,'image'=>$pic]);
        

        
    //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Deletefile($name)
    {
            if(Storage::disk('public')->delete('/images/'.$name)){
        return response()->json([
            'success'=>$name,
        ]);
            }
    }
    
    public function destroy($id)
    {
        
          
       $prod = product::find($id);
        $image = $prod->image;
        if(Storage::disk('public')->delete('/images/'.$image)){
            $prod->delete();
        };

        
        
    }

    public function date()
    {
        
          
       $prod = product::all();

       foreach ($prod as $pro){

            $myDate = date('Y-m-d');
          $pro->exp_date = $myDate;
                         
                          

          $pro->save();
         
}

        
        
    }
}

<!-- <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | General Form Elements</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">


<link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">
  <!-- general form elements -->
  <!--<div class="container">-->
          <div class="box box-primary" style="margin-top: 20px;">
           <div class="box-header with-border" align="center">
              <h3 class="box-title" >Edit product info</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

                 @include('messages.errors')


            <form role="form"  action="{{route('product.update',$products->id)}}"  method="post" enctype="multipart/form-data" >

            	{{csrf_field()}}
            	 {{method_field('PUT')}}


              <div class="box-body">

              	<dev class="col-lg-6">
	                <div class="form-group">
	                  <label for="name">Name</label>
	                  <input type="text" name="name" class="form-control" id="InputName" placeholder="Product Name"
	                  value="{{$products->name}}">
	                </div>


	                 
	                <div class="form-group">
	                  <label for="commercialName">Commercial Name</label>
	                  <input type="text" name="commercial_name" class="form-control" id="InputCommercialName" placeholder="Commercial Name"
	                  value="{{$products->commercial_name}}">
	                </div>

	                 <div class="form-group">
	                  <label for="category">Category</label>
	                  <select  name="category" class="form-control" id="category">

	                  	@foreach($categories as $category)
	                  	<option value="{{$category->id}}">{{$category->name}}</option>

	                  	@endforeach
	           
	                  	</select>

	                </div>


	                <div class="form-group">
	                  <label for="purchasePrice">Purchase Price</label>
	                  <input type="text" name="purchase_price" class="form-control" id="InputPurchasePrice" placeholder="Purchase Price"
	                  value="{{$products->purchase_price}}">
	                </div>


	                 
	                <div class="form-group">
	                  <label for="salesPrice">Sales Price</label>
	                  <input type="text" name="sales_price" class="form-control" id="InputSalesPrice" placeholder="Sales Price"
	                  value="{{$products->sales_price}}">
	                </div>



	                <div class="form-group">
		                <label>Date:</label>

		                <div class="input-group date">
		                  <div class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                  </div>
		                  <input type="text" class="form-control pull-right" id="datepicker" name="exp_date"
		                  value="{{$products->exp_date}}">
		                </div>
                        <!-- /.input group -->
                    </div>


	               




                </dev>



                <dev class="col-lg-5 offset-col-lg-1" >


                	 <div class="form-group">
	                  <label for="amount">Amount</label>
	                  <input type="text" name="amount" class="form-control" id="InputAmount" placeholder="amount"
	                  value="{{$products->amount}}">
	                </div> 




	                <div class="form-group">
	                  <label for="exampleInputEmail1">Unit</label>
	                  <select name="unit" class="form-control">
	                  		@foreach($units as $unit)
	                  	<option value="{{$unit->id}}">{{$unit->name}}</option>

	                  	@endforeach
	                  	
	                  	</select>

	                </div>
	                


	                <div class="form-group">
	                  <label for="manufacturer">Manufacturer</label>
	                  <input type="text" name="manufaturer" class="form-control" id="InputManufacturer" placeholder="Manufacturer"
	                  value="{{$products->manufaturer}}">
	                </div> 






	                <div class="form-group">
	                  <label for="image">File input</label>
	                  <input type="file"   name="image" id="InputImage">

	                  <p class="help-block">Example block-level help text here.</p>


                       <img src="{{ Storage::disk('local')->Url($products->image) }}" style="height: 150px; width: 150px;">

	                </div>



	              </div>
	              <!-- /.box-body -->

	              <div class="box-footer">
	              	 <div align="right">
	                    <button  type="submit"  id="save" class="btn btn-primary">Save</button>
	                 </div>
	              </div>

                </dev>



            </form>
          </div>
          </div>

          <script type="text/javascript">
          	 var value = document.getElementById("category").value;


          </script>


<!-- bootstrap datepicker -->
<script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>

<script>
  $(function () {
 //Date picker
    $('#datepicker').datepicker({
    	format: "yyyy-mm-dd",
      autoclose: true
    });

});
</script>

<script>

	$(document).on('click', '#save', function(event){

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    // $("#item_name3").html(data[2]);
                    const pr = data.msg[0];
                    $('#item_name3').val(pr.name);
                    $('#order_item_unit_price3').val(pr.sales_price);
                    $("#order_item_quantity3").attr("placeholder", pr.amount);

                    //console.log(pr.name);  
               }

              });
                  
          });
</script>

  <!-- jQuery 2.2.3 -->
<script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{asset('dist/js/demo.js')}}"></script> -->



</body>
</html>



 -->
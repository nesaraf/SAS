@extends('layouts/app')

  
              @section('notif_amount')
             @extends('layouts.notifications')
               @endsection



@section('headsection')

<link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">

@endsection
@section('main_content')


  <!-- general form elements -->
  <div class="container">
          <div class="box box-primary" style="margin-top: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title">Add product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


            <form role="form"  action="{{route('product.store')}}"  method="post" enctype="multipart/form-data" >

            	{{csrf_field()}}
              <div class="box-body">

              	<dev class="col-lg-6">

                  <div class="form-group">
                    <label for="name">Barcode</label>
                    <input type="text" name="barcode" class="form-control" id="InputBarcode" placeholder="Product Barcode">
                  </div>
                  

	                <div class="form-group">
	                  <label for="name">Name</label>
	                  <input type="text" name="name" class="form-control" id="InputName" placeholder="Product Name">
	                </div>


	                 
	                <div class="form-group">
	                  <label for="commercialName">Commercial Name</label>
	                  <input type="text" name="commercial_name" class="form-control" id="InputCommercialName" placeholder="Commercial Name">
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
	                  <input type="text" name="purchase_price" class="form-control" id="InputPurchasePrice" placeholder="Purchase Price" pattern="[1-9]+" title="please enter number only">
	                </div>


	                 
	                <div class="form-group">
	                  <label for="salesPrice">Sales Price</label>
	                  <input type="text" name="sales_price" class="form-control" id="InputSalesPrice" placeholder="Sales Price" pattern="[1-9]+" title="please enter number only">
	                </div>



                </dev>



                <dev class="col-lg-5 offset-col-lg-1" >



                  <div class="form-group">
                    <label>Exp date:</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker" name="exp_date">
                    </div>
                        <!-- /.input group -->
                    </div>





                  <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="text" name="amount" class="form-control" id="InputAmount" placeholder="amount">
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
                    <input type="text" name="manufaturer" class="form-control" id="InputManufacturer" placeholder="Manufacturer">
                  </div> 



	                <div class="form-group">
	                  <label for="image">File input</label>
	                  <input type="file"   name="image" id="InputImage">

	                  <p class="help-block">Example block-level help text here.</p>
	                </div>


	              </div>
	              <!-- /.box-body -->

	              <div class="box-footer">
	                <button type="submit"   class="btn btn-primary">Save</button>
	              </div>

                </dev>



            </form>
          </div>
          </div>

@endsection

@section('footersection')

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


@endsection



@extends('layouts/app')

  
              @section('notif_amount')
              <span class="label label-danger"></span>  
            </a>
            <ul class="dropdown-menu">
              <li class="header"></li>


                <li>

                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-calendar " style="color:#ff0000;"></i> you have &nbsp<span style="color:#ff0000; text-decoration: underline;"></span>&nbsp items whit critical expiration date.
                    </a>
                  </li>
                  <li> <a href="#">
                      <i class="fa fa-battery-1"  style="color:#cc6600;"></i> &nbsp<span style="color:#cc6600; text-decoration: underline;"></span>&nbsp items whit low amount.
                    </a>
                  </li>
                  <li>
                     <a href="#">
                      <i class="glyphicon glyphicon-calendar" style="color:#cc6600;"></i> there is &nbsp<span style="color:#cc6600; text-decoration: underline;"></span>&nbsp items whit low expiration date.
                    </a>
                  </li>
                </ul>
              </li>
               @endsection



@section('headsection')

<link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">

@endsection
@section('main_content')


  <!-- general form elements -->
  <div class="container">
          <div class="box box-primary" style="margin-top: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title">Add  Employee</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


            <form role="form"  action="{{route('employee.store')}}"  method="post" enctype="multipart/form-data" >

            	{{csrf_field()}}
              <div class="box-body">

              	<dev class="col-lg-6">

                  <div class="form-group">
                    <label for="name">First name</label>
                    <input type="text" name="fname" class="form-control" id="InputBarcode" placeholder="First Name">
                  </div>
                  

	                <div class="form-group">
	                  <label for="name">Last Name</label>
	                  <input type="text" name="lname" class="form-control" id="InputName" placeholder="Last Name">
	                </div>


	                 
	                <div class="form-group">
	                  <label for="commercialName">Father Name</label>
	                  <input type="text" name="fathername" class="form-control" id="InputCommercialName" placeholder="Father Name">
	                </div>

	                 <div class="form-group">
	                  <label for="category">Date Of Birth</label>
                    <div class="form-group date">
                       <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                     <input type="text" name="dob" class="form-control" id="datepicker" placeholder="Date Of Birth">
</div>
	                </div>


	                <div class="form-group">
	                  <label for="purchasePrice">Email</label>
	                  <input type="email" name="email" class="form-control" id="InputPurchasePrice" placeholder="Email">
	                </div>


	                 
	                <div class="form-group">
	                  <label for="salesPrice">Mobile</label>
	                  <input type="text" name="mobile" class="form-control" id="InputSalesPrice" placeholder="Moble" pattern="[700][0-9]{9}">
	                </div>



                </dev>



                <dev class="col-lg-5 offset-col-lg-1" >



                  <div class="form-group">
                    <label>Phone</label>

                    <div class="input-group">

                      <input type="text" class="form-control pull-right"  name="phone" pattern="[700][0-9]{9}">
                    </div>
                        <!-- /.input group -->
                    </div>





                  <div class="form-group">
                    <label for="amount">Position</label>
                    <input type="text" name="position" class="form-control" id="InputAmount" placeholder="Position">
                  </div> 
                  


                  <div class="form-group">
                    <label for="manufacturer">Academic Degree</label>
                    <input type="text" name="degree" class="form-control" id="InputManufacturer" placeholder="Academic Degree">
                  </div> 



	<!--                 <div class="form-group">
	                  <label for="image">File input</label>
	                  <input type="file"   name="image" id="InputImage">

	                  <p class="help-block">Example block-level help text here.</p>
	                </div> -->


	              </div>
	              <!-- /.box-body -->

	              <div class="box-footer">
	                <button type="submit"   class="btn btn-primary">Save</button>
	              </div>

                </div>
    



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

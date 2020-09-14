@extends('layouts.app')

@section('headsection')
<link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">
@endsection



@section('main_content')
<!-- general form elements -->
  <div class="container">
          <div class="box box-primary" style="margin-top: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title">Add New bill</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


            <form role="form"  action="{{route('sale.store')}}"  method="post" enctype="multipart/form-data" >

            	{{csrf_field()}}
              <div class="box-body">

              	<dev class="col-lg-8">
	                <div class="form-group">
	                  <label for="name">Name</label>

	                  <select  name="name" class="form-control" id="name">

	                  	@foreach($customers as $customer)
	                  	<option value="{{$customer->id}}">{{$customer->name}}</option>

	                  	@endforeach
	           
	                  	</select>
	                </div>

	                <div class="form-group">
		                <label>Date:</label>

		                <div class="input-group date">
		                  <div class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                  </div>
		                  <input type="text" class="form-control pull-right" id="datepicker" name="date">
		                </div>
                        <!-- /.input group -->
                    </div>


	              <div class="box-footer">
	                <button type="submit"   class="btn btn-primary">create</button>
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
      autoclose: true
    });

});

</script>


@endsection
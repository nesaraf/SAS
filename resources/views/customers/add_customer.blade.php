@extends('layouts.app')


            @section('notif_amount')
             @include('layouts.notifications')
               @endsection
               
@section('main_content')

   <!-- general form elements -->
  <div class="container">
          <div class="box box-primary" style="margin-top: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title">add new customer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->



            <form role="form" action="{{route('customer.store')}}"  method="post">

              {{csrf_field()}}


              <div class="box-body">

              	<div class="col-lg-6">
	                <div class="form-group">
	                  <label for="customerName">Name</label>
	                  <input type="text" name="customerName" class="form-control" id="customerName" placeholder="Customer Name">
	                </div>


	                 
	                <div class="form-group">
	                  <label for="lastName">Last Name</label>
	                  <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Last Name">
	                </div>

	                 


	                <div class="form-group">
	                  <label for="pharmacy">Job</label>
	                  <input type="text" name="pharmacy" class="form-control" id="pharmacy" placeholder="Job">
	                </div>


	                 
	                <div class="form-group">
	                  <label for="phone">Phone</label>
	                  <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">
	                </div>


	                

	                
	                <div class="form-group">
	                  <label for="emailAddress">Email address</label>
	                  <input type="email" class="form-control" id="emailAddress" placeholder="Email Address"
	                  name="email">
                    </div>


                     <div class="form-group">
	                  <label for="address">Address</label>
	                  <input type="text" name="address" class="form-control" id="address" placeholder="Address">
	                </div>





	              <div class="box-footer">
	                <button type="submit"   class="btn btn-primary">save</button>
	                 <a type="button"  href="{{route('customer.index')}}"  class="btn btn-warning">back</a>
	              </div>

                </dev>

                </div>


            </form>
          </div>
          </div>

@endsection
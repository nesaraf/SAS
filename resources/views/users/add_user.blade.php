@extends('layouts.app')

 @section('notif_amount')
             @include('layouts.notifications')
               @endsection


@section('main_content')

   <!-- general form elements -->
  <div class="container">
          <div class="box box-primary" style="margin-top: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


            <form role="form"  action="{{route('user.store')}}"  method="post" enctype="multipart/form-data">

            		{{csrf_field()}} 
            		
              <div class="box-body">

              	<dev class="col-lg-6">
	                <div class="form-group">
	                  <label for="name">Name</label>
	                  <input type="text" name="name" class="form-control" id="name" placeholder="Name">
	                </div>


	                 
	                <div class="form-group">
	                  <label for="lastName">Last Name</label>
	                  <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Last Name">
	                </div>

	                 


	                <div class="form-group">
	                  <label for="username">User name </label>
	                  <input type="text" name="userName" class="form-control" id="username" placeholder="Username">
	                </div>


	                 
	                <div class="form-group">
	                  <label for="phone">Phone</label>
	                  <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">
	                </div>


	                

	                
	                <div class="form-group">
	                  <label for="emailAddress">Email address</label>
	                  <input type="email" class="form-control" id="emailAddress" placeholder="Email Address"  name="email">
                    </div>

                  </dev>


                  <dev class="col-lg-6">
	                <div class="form-group">
	                  <label for="password">Password</label>
	                  <input type="password" class="form-control" id="password" placeholder="Password"   name="password">
	                 </div>

	                 <div class="form-group">
	                  <label for="confirmPassword">Confirm Password</label>
	                  <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" name="repassword">
	                 </div>


	                 <div class="form-group">
	                  <label for="role">Role</label>
	                  <input type="text" class="form-control" id="role" placeholder="Role" name="role">
                    </div>

                    <div class="form-group">
	                  <label for="image">choose image</label>
	                  <input type="file"   name="image" id="InputImage">

	                  <p class="help-block">image will be shown as profile image also.</p>
	                </div>





	              <div class="box-footer">
	                <button type="submit"   class="btn btn-primary">Save</button>
	              </div>

	             </dev>

                

                
               </div>


            </form>
          </div>
          </div>

@endsection
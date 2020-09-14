@extends('layouts.app')

             @section('notif_amount')
             @include('layouts.notifications')
               @endsection
@section('main_content')

     <div class="container">
          <div class="box box-primary" style="margin-top: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title">Add category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


            <form role="form"  action="{{route('category.store')}}"  method="post">
              {{csrf_field()}}
              
              <div class="box-body">

              	<dev class="col-lg-8">
	                <div class="form-group">
	                  <label for="name">Name</label>
	                  <input type="text" name="name" class="form-control" id="InputName" placeholder="Caterory Name">
	                </div>


	                 
	              

	              </div>
	              <!-- /.box-body -->

	              <div class="box-footer">
	                <button type="submit"   class="btn btn-primary">Save</button>
                  <a href="{{route('category.index')}}"  class="btn btn-warning">back</a>
	              </div>

                </dev>



            </form>
          </div>
          </div>


@endsection
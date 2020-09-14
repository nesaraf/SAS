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


            <form role="form" action="{{route('category.update',$categories->id)}}" method="post">

              {{csrf_field()}}
              {{method_field('PUT')}} 

              <div class="box-body">
              	<dev class="col-lg-8">
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Name</label>
	                  <input type="text" name="name" class="form-control" id="InputName" placeholder="Product Name"
                    value="{{$categories->name}}">
	                </div>


	                 
	              

	              </div>
	              <!-- /.box-body -->

	              <div class="box-footer">
	                <button type="submit"   class="btn btn-primary">update</button>
	              </div>

                </dev>



            </form>
          </div>
          </div>


@endsection
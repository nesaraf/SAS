@extends('layouts/app')

            @section('notif_amount')
             @include('layouts.notifications')
               @endsection


@section('headsection')
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@endsection



@section('main_content')
 <section class="content-header">
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Customer List</h3>

          <a   class="  col-lg-offset-5 col-sm-offset-4 btn btn-success" href="{{route('customer.create')}}">add new customer</a>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          




             <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Customer Name</th>
                  <th>Lastname</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Pharmacy</th>
                  <th>Address</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>


                @foreach ($customers as $customer )
                	
               

                <tr>
                  <td>  {{  $customer->name  }}      </td>
                  <td>  {{  $customer->last_name }}  </td>
                  <td>  {{  $customer->phone  }}     </td>
                  <td>  {{  $customer->email  }}     </td>
                  <td>  {{  $customer->company  }}   </td>
                  <td>  {{  $customer->address  }}   </td>
                  <td> <a href="{{route('customer.edit',$customer->id)}}"> <span class="glyphicon glyphicon-edit"></span> </a></td>

                  <form  id="delete-form-{{($customer->id)}}"  action="{{route('customer.destroy', $customer->id)}}"
                   style="display:none"  method="post">
                   {{ csrf_field() }}
                   {{ method_field('DELETE') }}


                  </form>
                  <td><a href="" onclick="
                  if(confirm('are you sure, do you want to delete this customer?')){
                  event.preventDefault();
                   document.getElementById('delete-form-{{$customer->id}}').submit();
                   }


                   else{event.preventDefault();}">
                   <span class="glyphicon glyphicon-trash"></span> </a></td>
                </tr> 
                @endforeach 
                


                </tbody>
                <tfoot>
                <tr>
                  <th>Customer Name</th>
                  <th>Lastname</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Pharmacy</th>
                  <th>Address</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          

          





        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>


@endsection


@section('footersection')

<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function (){
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

@endsection
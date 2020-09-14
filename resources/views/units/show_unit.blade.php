@extends('layouts/app')

            @section('notif_amount')
             @include('layouts.notifications')
               @endsection

@section('headsection')
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@endsection



@section('main_content')
 

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Units List</h3>

          <a   class="  col-lg-offset-5 col-sm-offset-4 btn btn-success" href="{{route('unit.create')}}">add new unit</a>

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
                  <th width="10%">S.No</th>
                  <th width="80%">Unit Name</th>
                  <th width="5%">Edit</th>
                  <th width="5%">Delete</th>
                </tr>
                </thead>
                <tbody>


                @foreach ($units as $unit )
                
                <tr>

                  <td>  {{  $loop->index+1 }}   </td>
                  <td>  {{  $unit->name  }} </td>
                  <td> <a href="{{route('unit.edit',$unit->id)}}"> <span class="glyphicon glyphicon-edit"></span> </a></td>

                  <form  id="delete-form-{{($unit->id)}}"  action="{{route('unit.destroy', $unit->id)}}"
                   style="display:none"  method="post">
                   {{ csrf_field() }}
                   {{ method_field('DELETE') }}


                  </form>
                  <td><a href="" onclick="
                  if(confirm('are you sure, do you want to delete this unit?')){
                  event.preventDefault();
                   document.getElementById('delete-form-{{$unit->id}}').submit();
                   }


                   else{event.preventDefault();}">
                   <span class="glyphicon glyphicon-trash"></span> </a></td>
                </tr> 
                @endforeach 
                


                </tbody>
                <tfoot>
                <tr>
                  <th width="10%">S.No</th>
                  <th width="80%">Unit Name</th>
                  <th width="5%">Edit</th>
                  <th width="5%">Delete</th>
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
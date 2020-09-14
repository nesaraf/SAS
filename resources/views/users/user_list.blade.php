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
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@endsection



@section('main_content')
 

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Users List</h3>

          <a   class="  col-lg-offset-5 col-sm-offset-4 btn btn-success" href="{{route('register')}}">add new user</a>

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
                  <th>S.No</th>
                  <th>Name</th>
                  <th>L.Name</th>
                  <th>Phone</th>
                  <th>Password</th>
                  <th>Role</th>
                  <th>Photo</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>


                @foreach ($users as $user )
                
                <tr>

                  <td>  {{  $loop->index+1 }}   </td>
                  <td>  {{  $user->employee->fname  }} </td>
                  <td>  {{  $user->employee->lname  }} </td>
                  <td>  {{  $user->employee->phone  }} </td>
                  <td>  {{  $user->password  }} </td>
                  @if($user->role == 1)
                  <td>Admin</td>
                  @else
                  <td>employee</td>
                  @endif
                  <td>  {{  $user->photo  }} </td>

                  <td>

                    <div class='dropdown'>
                        <a class='label label-info' id='dLabel' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
                        Action
                        <span class='caret'></span>
                        </a>
                        <ul class='action-Dd dropdown-menu'>
<!--                        <li><a style='color:#007bff'><span class='glyphicon glyphicon-list-alt'></span>&nbsp; Details</a></li>-->
                        <li><a style='color:#ffc107' data-toggle='modal' data-target='.Edit-modal' onclick='getEditData(7)'><span class='glyphicon glyphicon-pencil'></span>&nbsp; Edit</a></li>
                        <li><a style='color:#dc3545' onclick='setDeleteId(7)'><span class='glyphicon glyphicon-trash'></span>&nbsp; Delete</a></li>
                        </ul>
                    </div>
        

                </td>
                 
                </tr> 
                @endforeach 
                


                </tbody>
                <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>L.Name</th>
                  <th>Phone</th>
                  <th>Password</th>
                  <th>Role</th>
                  <th>Photo</th>
                  <th>Action</th>
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
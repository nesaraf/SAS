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
@include('Employee/editmodal');


@section('main_content')
 

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Empoyees List</h3>

          <a   class="  col-lg-offset-5 col-sm-offset-4 btn btn-success" href="{{route('employee.create')}}">add new Empoyee</a>

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
                  <th>First Name</th>
                  <th>L.Name</th>
                  <th>DOB</th>
                  <th>Phone</th>
                  <th>Position</th>
                  <th>Degree</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>


                @foreach ($emps as $emp )
                
                <tr>

                  <td>  {{  $loop->index+1 }}   </td>
                  <td>  {{  $emp->fname  }} </td>
                  <td>  {{  $emp->lname  }} </td>
                  <td>  {{  $emp->dob  }} </td>
                  <td>  {{  $emp->phone  }} </td>
                  <td>  {{  $emp->position  }} </td>
                  <td>  {{  $emp->degree  }} </td>

                  <td>

                    <div class='dropdown'>
                        <a class='label label-info' id='dLabel' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
                        Action
                        <span class='caret'></span>
                        </a>
                        <ul class='action-Dd dropdown-menu'>
                        <li><a style='color:#007bff'><span class='glyphicon glyphicon-list-alt'></span>&nbsp; Details</a></li>
                        <li><a style='color:#ffc107' data-toggle='modal' data-target='.Edit-modal' onclick='getemp({{$emp->id}})'><span class='glyphicon glyphicon-pencil'></span>&nbsp; Edit</a></li>
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
                  <th>First Name</th>
                  <th>L.Name</th>
                  <th>DOB</th>
                  <th>Phone</th>
                  <th>Position</th>
                  <th>Degree</th>
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
<script src="{{asset('plugins/alert/alert.js')}}"></script>
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




  function getemp(id){
                  $.ajax({
                type:'GET',
                url:'getemp/'+id,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    

                  var emp = data.emps;
                   
                $('#Iid').val(emp.id);
                $('#fname').val(emp.fname);
                $('#lname').val(emp.lname);
                $('#fathername').val(emp.fathername);
                $('#datepicker').val(emp.dob);
                $('#email').val(emp.email);

                // $('#category').val(data.);
              

                $('#mobile').val(emp.mobile);
                $('#phone').val(emp.phone);
                $('#position').val(emp.position);
                $('#degree').val(emp.degree);
             

//          var currentUnit=emp.unit.name;
//                  $('#InputUnits').append( "<option id='cUnit' selected value="+emp.unit.id+">"+currentUnit+"</option>")
//                   units=data.units;
//                    units.forEach( unit => {
//                      $('#InputUnits').append( "<option value="+unit.id+">"+unit.name+"</option>" );
//
//                    });
//
//                $('#InputManufacturer').val(emp.manufaturer);
//
//
//
//                  var imagename = emp.image;
//
//
//               $('#pre-img').attr('src','http://127.0.0.1:8000/storage/images/'+imagename);
//
//                 $('#p-pre-img').attr('src','http://127.0.0.1:8000/storage/images/'+imagename);
 
               }
                    });  
//
};
    
 $('#EditForm').on('submit',function(event){
      var id = $("#Iid").val();
                   event.preventDefault(); 
        $.ajax({
                type:'POST',
                url:'UpdateEmp/'+id,
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:new FormData($('#EditForm')[0]),
                cache: false,
                contentType:false,
                processData: false,
                success:function(data){
                    swal({
                        title:"انجام شد",
                        text:"فایل آپدیت موفقانه آپدیت گردید",
                        icon:"success",
                        button:false,
                        timer: 1500,
                    });
                    //mytable.ajax.reload();
                    $('.Edit-modal').modal('hide');
//                    resetForm();
//                    $('.chooseFile').hide();
//                    $("#selectedfile").hide();
//                    $(".changeFbtn").show();
                   }
              });


});
</script>

@endsection
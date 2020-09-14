@extends('layouts/app')

              
              @section('notif_amount')
              <?php 
               $notif =0;
               $low_amount=0;
               $low_date=0;
               $critical_date = 0;
              foreach($products as $product ){

       
                if($product->amount <= 1000){
                   $low_amount++;
                 }



              $date1 = Date('y-m-d');
              $Exp_date = $product->exp_date;
              //$date1 = Date('2018-04-08');
              $dStart = new DateTime($Exp_date);
                $dEnd  = new DateTime($date1);
                $dDiff = $dEnd->diff($dStart);
                $final_dateDays = $dDiff->format('%R').$dDiff->days;
            // echo $dDiff->format('%R'); // use for point out relation: smaller/greater
            //     echo $dDiff->days;

                 if($final_dateDays<365 && $final_dateDays>183 ){
                  
                      $low_date++;  
                   }

                   if($final_dateDays<183){
                    $critical_date++;
                   }


                }

                $notif = $critical_date+$low_date+$low_amount;
           

           echo 
              '<span class="label label-danger">'.$notif.'</span>  
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have &nbsp'.$notif.' &nbsp notifications</li>


                <li>

                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="'.route("CriExpDate").'">
                      <i class="fa fa-calendar " style="color:#ff0000;"></i> you have &nbsp<span style="color:#ff0000; text-decoration: underline;">'.$critical_date.' '.'</span>&nbsp items whit critical expiration date.
                    </a>
                  </li>
                  <li> <a href="'.route("LowAmount").'">
                      <i class="fa fa-battery-1"  style="color:#cc6600;"></i> &nbsp<span style="color:#cc6600; text-decoration: underline;">'.$low_amount.'</span>&nbsp items whit low amount.
                    </a>
                  </li>
                  <li>
                     <a href="'.route("LowExpDate").'">
                      <i class="glyphicon glyphicon-calendar" style="color:#cc6600;"></i> there is &nbsp<span style="color:#cc6600; text-decoration: underline;">'.$low_date.'</span>&nbsp items whit low expiration date.
                    </a>
                  </li>
                </ul>
              </li>'
                



                ?>   
               @endsection


@section('headsection')
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">

@endsection



@section('main_content')





    <!-- Main content -->
    <section class="content" >

      <!-- Default box -->
      <div class="box" >
        <div class="box-header with-border">
          <h3 class="box-title">bill List</h3>

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


          <!-- Modal -->

              <table  id="example1" class="table table-bordered table-striped">
                <thead>
                 <th colspan="4"><center>Details</center></th>
			     <th colspan="4"> <center>Action </center></th>
                  
                <tr>
                  <th  width="5%">Bill No.</th>
                  <th  width="30%">Customer Name</th>
                  <th  width="20%">Date</th>
                  <th  width="20%">Total</th>
                  <th  width="5%">pdf</th>
                  <th  width="5%">show_details</th>
                  <th  width="5%">Edit</th>
                </tr>
              
                </thead>
                <tbody>


                 @foreach($sales as $sale )
              
                <tr>
                  <td> {{ $sale->bill_no }} </td>
                  <td> {{ $sale->customer->name}} </td>
                  <td> {{ $sale->date }} </td>
                  <td> {{ $sale->total }} </td>
                  <td><a href="{{route('pdf.show',$sale->bill_no)}}"><i style="color:#3c8dbc;" class="fa fa-file-pdf-o" aria-hidden="true"></i></td>

                  <td> <a href="{{route('sale_detail.edit',$sale->bill_no)}}"><i style="color:#3c8dbc;" class="fa fa-list" aria-hidden="true"></i></a></td>
                  
                  <td><a id="pdf" href="{{route('product.edit',$product->id)}}"  data-toggle="modal" data-target=".bs-example-modal-lg"> <span class="glyphicon glyphicon-edit"></span> </a></td>
                </tr> 
                @endforeach 
                


                </tbody>
	               <tfoot>
			                <tr>
			                  <th>Bill No.</th>
			                  <th>Customer Name</th>
			                  <th>Date</th>
			                  <th>Total</th>
			                  <th>pdf</th>
                        <th>show_details</th>
			                  <th>Edit</th>
			                </tr>

			                <tr>
			                  <th colspan="4"><center>Details</center></th>
			                  <th colspan="4"> <center>Action </center></th>
			                </tr>
	               </tfoot>
              </table>
            </div>
            <!-- /.box-body -->

      
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
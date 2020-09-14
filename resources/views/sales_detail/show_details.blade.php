
@extends('layouts.app')



 @section('notif_amount')
            @extends('layouts.notifications')
            @endsection

@section('headsection')

<link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">
<!-- <script type="text/javascript"  src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script> -->
<!-- <script type="text/javascript"  src="{{asset('js/bootstrap.min.js')}}"></script>  -->
<script type="text/javascript"  src="https://code.jquery.com/jquery-2.2.3.js"></script>
<!--<script type="text/javascript"  src="{{asset('plugins/datatables/ datatables.bootstrap.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('plugins/datatables/ datatables.jquery.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('plugins/datatables/datatables.bootstrap.min.css')}}">  -->
@endsection


@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <!-- <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>
  -->

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">invoice details</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          



       

       <!-- 
        /////////////////////////////////////////////
        main content
        ///////////////////////////////////////////
       -->

<form method="post" id="invoice_form" action="{{route('sale.store')}}">

   {{ csrf_field() }}

        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
                <td colspan="2">
                  <div class="row">
                    <div class="col-md-4">
                      <br /> 

                       @foreach($sales as $sale )

                      <label>bill no.</label>
                       
                      <input type="text" value="{{ $sale->bill_no }}" name="order_no" id="order_no" class="form-control input-sm" />
                   




                <label>customer name:</label>
                 
                    <input type="text" name="customer" id="customer" class="form-control input-sm"
                    value="{{ $sale->customer->name }}" />
                    
                     

             


                         <label>date:</label>
                         <input type="text" name="order_date" id="order_date" class="form-control input-sm" value="{{ $sale->date }}" />

                         @endforeach 
                    </div>
                  </div>
                  <br />
        <table  id="example1" class="table table-bordered table-striped">
                <thead>
                 <th colspan="4"><center>Details</center></th>
           <th colspan="4"> <center>Action </center></th>
                  
                <tr>
                  <th  width="5%">Sr NO.</th>
                  <th  width="30%">Item Name</th>
                  <th  width="20%">Barcode</th>
                  <th  width="5%">Amount</th>
                  <th  width="10%">unit Price</th>
                  <th  width="10%">Total Price</th>
                  <th  width="5%">pdf</th>
                </tr>
              
                </thead>
                <tbody>
                      
                    <?php $i=1 ?>
                 @foreach($sale_details as $details )
                     
                
                <tr>
                  <td>{{$i}}</td>
                  <td> {{ $details->product->name }} </td>
                  <td> {{ $details->product->barcode}} </td>
                  <td> {{ $details->quantity}} </td>
                  <td> {{ $details->unit_price}} </td>
                  <td> {{ $details->total_price}} </td>
                  <td><a href="route{{'pdf.show','$details->sales_id'}}"> <i style="color:#3c8dbc;" class="fa fa-file-pdf-o" aria-hidden="true"></i> </a></td>
                </tr> 

                   <?php $i++ ?>
                @endforeach 
                


                </tbody>
                 <tfoot>
                       <tr>
                  <th  width="5%">Sr NO.</th>
                  <th  width="30%">Item Name</th>
                  <th  width="20%">Barcode</th>
                  <th  width="5%">Amount</th>
                  <th  width="10%">unit Price</th>
                  <th  width="10%">Total Price</th>
                  <th  width="5%">pdf</th>
                </tr>

                      <tr>
                        <th colspan="4"><center>Details</center></th>
                        <th colspan="4"> <center>Action </center></th>
                      </tr>
                 </tfoot>
              </table>
    </div>
  </form>

        <!-- 
        /////////////////////////////////////////////
         end main content
        ///////////////////////////////////////////
       -->

     


        </div>
     
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  @endsection


  @section('footersection')
   <!-- <script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script> -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
      <script>
     
        </script>


  @endsection
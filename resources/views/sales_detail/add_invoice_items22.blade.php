
@extends('layouts.app')



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

<link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">

<style type="text/css">

  #submit{
    margin-left:auto;
    margin-right:auto;
    display:block;

  }

.bgc{
 

}

</style>
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
          <h3 class="box-title">create new invoice</h3>

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



                      <label>bill no.</label>
                      <input type="text" name="order_no" id="order_no" class="form-control input-sm"  value="{{'IV19-'.$Lid}}" readonly />


                <label>bill to:</label>
                        
                   <div class="form-group">
                    <select  name="customer" class="form-control" id="customer" required>
                     <option>Choose A customer</option>
                      @foreach($customers as $customer)
                      <option value="{{$customer->id}}">{{$customer->name}}</option>

                      @endforeach
             
                      </select>

                  </div>


                         <label>date:</label>
                         <input type="text" name="order_date" id="order_date" class="form-control input-sm" readonly placeholder="Select Invoice Date" />
                    </div>
                  </div>
                  <br />
                  <table id="invoice-item-table" class="table table-bordered">
                    <tr>
                      <th width="3%">Sr No.</th>
                      <th width="10%">Barcod</th>
                      <th width="20%">Item Name</th>
<!--                      <th style="display:non">Item Name</th>-->
                      <th width="5%">Quantity</th>
                      <th width="5%"> Unit Price</th>
                      <th width="10%">Total Price</th>
                      <th width="3%">Action</th>
                    </tr>
                    
                    <tr id="data">
                      <td><span id="sr_no">1</span></td>
                      <td><input type="text" name="item_barcod[]"  id="Xi1" class="form-control input-sm bcode" onblur="getproduct(this.value)"/></td>
                        
                      <td><input type="text" name="item_name[]" id="IN1" class="form-control input-sm" /></td>
                        
                        <td style="display:none;"><input type="text" name="PID[]" id="PID1" class="form-control input-sm"  /></td>
                        
                      <td><input type="text" name="order_item_quantity[]" id="Qi1" data-srno="1" class="form-control input-sm order_item_quantity" onchange="getlinetotal(this.value)" /></td>
                        
                      <td><input type="text" name="order_item_unit_price[]" id="Yi1" data-srno="1" class="form-control input-sm number_only order_item_unit_price" /></td>
                        
                      <td><input type="text" name="order_item_total_price[]" id="Zi1" data-srno="1" class="form-control input-sm order_item_total_price" /></td>
                      
                      <td></td>
                    </tr>
                  </table>
                  <div align="right">
                    <button type="button" name="add_row" id="add_row" class="btn btn-success btn-xs">+</button>
                  </div>
                </td>
              </tr>
              <tr>
<!--
                <td align="right"><b>Total</td>
                <td align="right"><b><input type="text" name="final_total_amt" id="final_amount" readonly="readonly"></input></b></td>
-->
              </tr>
              <tr>
                <td colspan="2"></td>
              </tr>
            
          </table>
       

        
    </div>
        
    <button id="submit" class="btn btn-primary" > create </button>
  </form>




        <!-- 
        /////////////////////////////////////////////
         end main content
        ///////////////////////////////////////////
       -->

     


        </div>
        <!-- /.box-body 
        <div class="box-footer">
          Footer
        </div>
    -->         







        <!-- /.box-footer-->
      </div>
      <!-- /.box -->



    </section>
    <!-- /.content -->
  </div>
  @endsection


  @section('footersection')
   <!-- <script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script> -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js">
</script>
      <script>
             var Qi ='#Qi1';
              var Xi = '#Xi1';
              var Zi = '#Zi1';
              var Yi = '#Yi1';
              var IN = '#IN1';
               var PID ='#PID1';
          $(document).ready(function(){
  
//              function removeId(){
//               Qi ='';
//               Xi = '';
//               Zi = '';
//               Yi = '';
//               IN = '';
//               PID = '';
//              }
      
              count= 1;
            function addRow(){
                count++; 
           
          $('#total_item').val(count);
          var html_code = '';
          html_code += '<tr id="row_id_'+count+'">';
          html_code += '<td><span id="sr_no" class="bgc">'+count+'</span></td>';

          html_code += '<td><input type="text" class="bgc" name="item_barcod[]"  id="Xi'+count+'" class="form-control input-sm bcode" onblur="getproduct(this.value)" /></td>';
          
          html_code += '<td><input type="text"  class="bgc" name="item_name[]" id="IN'+count+'" class="form-control input-sm" /></td>';
          html_code += '<td style="display:none;"><input type="text" name="PID[]" id="PID'+count+'" class="form-control input-sm"  /></td>';
          
          html_code += '<td><input type="text" class="bgc" name="order_item_quantity[]" id="Qi'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_quantity" onchange="getlinetotal(this.value)" /></td>';
          html_code += '<td><input type="text" class="bgc" name="order_item_unit_price[]" id="Yi'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_unit_price" /></td>';
          html_code += '<td><input type="text" class="bgc" name="order_item_total_price[]" id="Zi'+count+'" data-srno="'+count+'" class="form-control input-sm order_item_total_price" /></td>';
          
          html_code += '<td><button type="button"  name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></td>';
          html_code += '</tr>';
          $('#invoice-item-table').append(html_code);
               
                   
               Qi ='#Qi'+count;
               Xi = '#Xi'+count;
               Zi = '#Zi'+count;
               Yi = '#Yi'+count;
               IN = '#IN'+count;
               PID = '#PID'+count;
                   
                   console.log(Xi);
               }
              


      
         var final_total=0;


         $(document).on('click', '#add_row', function(){
          addRow();
          

        });


         $(document).on('click', '.remove_row', function(){
          var row_id = $(this).attr("id");
          //mycode

          //end mycode
          var total_item_amount = $('#order_item_final_amount'+row_id).val();
          var final_amount = $('#final_total_amt').text();
          var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
          $('#final_total_amt').text(result_amount);
          $('#row_id_'+row_id).remove();
          count--;
          $('#total_item').val(count);
        });



           
        $(function () {
             //   Date picker
                $("#order_date").datepicker({
                 format: "dd-mm-yyyy",
                 autoclose: true


                });

                 $( "#order_date" ).datepicker('setDate', new Date());


              });

});


               function getproduct(bcode){

         console.log(Xi);
                   var barcode = bcode;

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    const pr = data.msg[0];
                

                    $(IN).val(pr.name);
                    $(Yi).val(pr.sales_price);
                    $(PID).val(pr.id);

               }
             });
                


            }
         function getlinetotal(quantity){
                var TitemPrice = $(Yi).val()*quantity;
                $(Zi).val(TitemPrice);
        
           
              
          }


        </script>


  @endsection
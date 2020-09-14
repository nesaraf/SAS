
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
                      <input type="text" name="order_no" id="order_no" class="form-control input-sm" placeholder="Enter Invoice No." />


                <label>bill to:</label>
                        
                   <div class="form-group">
                    <select  name="customer" class="form-control" id="customer">

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
                      <th width="5%">Quantity</th>
                      <th width="5%"> Unit Price</th>
                      <th width="10%">Total Price</th>
                      <th width="3%">Action</th>
                    </tr>
                    
                    <tr>
                      <td><span id="sr_no">1</span></td>
                      <td><input type="text" name="item_barcod[]"  id="item_barcod1" class="form-control input-sm " /></td>
                      <td><input type="text" name="item_name[]" id="item_name1" class="form-control input-sm" /></td>
                      <td><input type="text" name="order_item_quantity[]" id="order_item_quantity1" data-srno="1" class="form-control input-sm order_item_quantity" /></td>
                      <td><input type="text" name="order_item_unit_price[]" id="order_item_unit_price1" data-srno="1" class="form-control input-sm number_only order_item_unit_price" /></td>
                      <td><input type="text" name="order_item_total_price[]" id="order_item_total_price1" data-srno="1" class="form-control input-sm order_item_total_price" readonly /></td>
                      
                      <td></td>
                    </tr>
                  </table>
                  <div align="right">
                    <button type="button" name="add_row" id="add_row" class="btn btn-success btn-xs">+</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td align="right"><b>Total</td>
                <td align="right"><b><input type="text" name="final_total_amt" id="final_total_amt" readonly="readonly"></input></b></td>
              </tr>
              <tr>
                <td colspan="2"></td>
              </tr>
             
          </table>
       

        <input type="submit" name="create_invoice" id="create_invoice" class="btn btn-info" value="Create"/> 
    </div>
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
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
      <script>
        

      $(document).ready(function(){
       // var final_total_amt = $('#final_total_amt').text();
         count= 1;
         var final_total=0;
          $(document).on('keydown','#item_barcod'+count , function(){

          
          count++;
           
          $('#total_item').val(count);
          var html_code = '';
          html_code += '<tr id="row_id_'+count+'">';
          html_code += '<td><span id="sr_no">'+count+'</span></td>';

          html_code += '<td><input type="text" name="item_barcod[]"  id="item_barcod'+count+'" class="form-control input-sm" /></td>';
          
          html_code += '<td><input type="text" name="item_name[]" id="item_name'+count+'" class="form-control input-sm" /></td>';
          
          html_code += '<td><input type="text" name="order_item_quantity[]" id="order_item_quantity'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_quantity" /></td>';
          html_code += '<td><input type="text" name="order_item_unit_price[]" id="order_item_unit_price'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_unit_price" /></td>';
          html_code += '<td><input type="text" name="order_item_total_price[]" id="order_item_total_price'+count+'" data-srno="'+count+'" class="form-control input-sm order_item_total_price" readonly /></td>';
          
          html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></td>';
          html_code += '</tr>';
          $('#invoice-item-table').append(html_code);



       
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

              

              //ajax for filling properties  
                 $(document).on('blur', '#item_barcod1', function(event){
                   var barcode = $('#item_barcod1').val();

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    // $("#item_name1").html(data[2]);
                    const pr = data.msg[0];
                    $('#item_name1').val(pr.name);
                    $('#order_item_unit_price1').val(pr.sales_price);
                    $("#order_item_quantity1").attr("placeholder", pr.amount);

                    updateAmount();

                    //console.log(pr.name);  
               }
             });

              });





              $(document).on('blur', '#item_barcod2', function(event){
              var barcode = $('#item_barcod2').val();

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    // $("#item_name1").html(data[2]);
                    const pr = data.msg[0];
                    $('#item_name2').val(pr.name);
                    $('#order_item_unit_price2').val(pr.sales_price);
                      $("#order_item_quantity2").attr("placeholder", pr.amount);


                    //console.log(pr.name);  
               }
                    });    
          });




              $(document).on('blur', '#item_barcod3', function(event){
              var barcode = $('#item_barcod3').val();

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    // $("#item_name3").html(data[2]);
                    const pr = data.msg[0];
                    $('#item_name3').val(pr.name);
                    $('#order_item_unit_price3').val(pr.sales_price);
                    $("#order_item_quantity3").attr("placeholder", pr.amount);

                    //console.log(pr.name);  
               }

              });
                  
          });



              $(document).on('blur', '#item_barcod4', function(event){
              var barcode = $('#item_barcod4').val();

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    // $("#item_name4").html(data[2]);
                    const pr = data.msg[0];
                    $('#item_name4').val(pr.name);
                    $('#order_item_unit_price4').val(pr.sales_price);
                     $("#order_item_quantity4").attr("placeholder", pr.amount);
                    
      

                    //console.log(pr.name);    
               }
                 });        
          });




              $(document).on('blur', '#item_barcod5', function(event){
              var barcode = $('#item_barcod5').val();

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    // $("#item_name5").html(data[2]);
                    const pr = data.msg[0];
                    $('#item_name5').val(pr.name);
                    $('#order_item_unit_price5').val(pr.sales_price);
                     $("#order_item_quantity5").attr("placeholder", pr.amount);

                    //console.log(pr.name);  
               }
                    });       
          });




              $(document).on('blur', '#item_barcod6', function(event){
              var barcode = $('#item_barcod6').val();

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    // $("#item_name6").html(data[2]);
                    const pr = data.msg[0];
                    $('#item_name6').val(pr.name);
                    $('#order_item_unit_price6').val(pr.sales_price);
                     $("#order_item_quantity6").attr("placeholder", pr.amount);

                    //console.log(pr.name);  
               }
                    });     
          });




              $(document).on('blur', '#item_barcod7', function(event){
              var barcode = $('#item_barcod7').val();

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    // $("#item_name7").html(data[2]);
                    const pr = data.msg[0];
                    $('#item_name7').val(pr.name);
                    $('#order_item_unit_price7').val(pr.sales_price);
                     $("#order_item_quantity7").attr("placeholder", pr.amount);

                    //console.log(pr.name);    
               }
                    });     
          });




              $(document).on('blur', '#item_barcod8', function(event){
              var barcode = $('#item_barcod8').val();

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    // $("#item_name8").html(data[2]);
                    const pr = data.msg[0];
                    $('#item_name8').val(pr.name);
                    $('#order_item_unit_price8').val(pr.sales_price);
                     $("#order_item_quantity8").attr("placeholder", pr.amount);

                    //console.log(pr.name);  
               }
                    });     
          });




              $(document).on('blur', '#item_barcod9', function(event){
              var barcode = $('#item_barcod9').val();

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    // $("#item_name9").html(data[2]);
                    const pr = data.msg[0];
                    $('#item_name9').val(pr.name);
                    $('#order_item_unit_price9').val(pr.sales_price);
                     $("#order_item_quantity9").attr("placeholder", pr.amount);

                    //console.log(pr.name);

               }
                    });     
          });


              

            $(document).on('blur', '#item_barcod10', function(event){
            var barcode = $('#item_barcod10').val();

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    // $("#item_name10").html(data[2]);
                    const pr = data.msg[0];
                    $('#item_name10').val(pr.name);
                    $('#order_item_unit_price10').val(pr.sales_price);
                     $("#order_item_quantity10").attr("placeholder", pr.amount);

                    //console.log(pr.name);  
               }
                    });        
          });




              $(document).on('blur', '#item_barcod11', function(event){
              var barcode = $('#item_barcod11').val();

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    // $("#item_name11").html(data[2]);
                    const pr = data.msg[0];
                    $('#item_name11').val(pr.name);
                    $('#order_item_unit_price11').val(pr.sales_price);
                     $("#order_item_quantity11").attr("placeholder", pr.amount);

                    //console.log(pr.name);    
               }
                    });     
          });




              $(document).on('blur', '#item_barcod12', function(event){
              var barcode = $('#item_barcod12').val();

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    // $("#item_name12").html(data[2]);
                    const pr = data.msg[0];
                    $('#item_name12').val(pr.name);
                    $('#order_item_unit_price12').val(pr.sales_price);
                     $("#order_item_quantity12").attr("placeholder", pr.amount);

                    //console.log(pr.name);

                  
                   
               }
                    });
                  });




              $(document).on('blur', '#item_barcod13', function(event){
              var barcode = $('#item_barcod13').val();

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    // $("#item_name13").html(data[2]);
                    const pr = data.msg[0];
                    $('#item_name13').val(pr.name);
                    $('#order_item_unit_price13').val(pr.sales_price);
                     $("#order_item_quantity13").attr("placeholder", pr.amount);

                    //console.log(pr.name);   
               }
                    });       
          });




              $(document).on('blur', '#item_barcod14', function(event){
              var barcode = $('#item_barcod14').val();

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    // $("#item_name14").html(data[2]);
                    const pr = data.msg[0];
                    $('#item_name14').val(pr.name);
                    $('#order_item_unit_price14').val(pr.sales_price);
                     $("#order_item_quantity14").attr("placeholder", pr.amount);

                    //console.log(pr.name);
   
               }
                    });    
          });



              $(document).on('blur', '#item_barcod15', function(event){
              var barcode = $('#item_barcod15').val();

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    // $("#item_name15").html(data[2]);
                    const pr = data.msg[0];
                    $('#item_name15').val(pr.name);
                    $('#order_item_unit_price15').val(pr.sales_price);
                     $("#order_item_quantity15").attr("placeholder", pr.amount);

                    //console.log(pr.name);  
               }
                    });   
          });





              $(document).on('blur', '#item_barcod16', function(event){
              var barcode = $('#item_barcod16').val();

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    // $("#item_name16").html(data[2]);
                    const pr = data.msg[0];
                    $('#item_name16').val(pr.name);
                    $('#order_item_unit_price16').val(pr.sales_price);
                     $("#order_item_quantity16").attr("placeholder", pr.amount);

                    //console.log(pr.name); 
               }
                    });     
          });



              $(document).on('blur', '#item_barcod17', function(event){
              var barcode = $('#item_barcod17').val();

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    // $("#item_name17").html(data[2]);
                    const pr = data.msg[0];
                    $('#item_name17').val(pr.name);
                    $('#order_item_unit_price17').val(pr.sales_price);
                     $("#order_item_quantity17").attr("placeholder", pr.amount);

                    //console.log(pr.name);
 
               }
                    });     
          });





              $(document).on('blur', '#item_barcod18', function(event){
              var barcode = $('#item_barcod18').val();

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    // $("#item_name18").html(data[2]);
                    const pr = data.msg[0];
                    $('#item_name18').val(pr.name);
                    $('#order_item_unit_price18').val(pr.sales_price);
                     $("#order_item_quantity18").attr("placeholder", pr.amount);

                    //console.log(pr.name);

                  
                   
               }
                    });     
          });




              $(document).on('blur', '#item_barcod19', function(event){
              var barcode = $('#item_barcod19').val();

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    // $("#item_name19").html(data[2]);
                    const pr = data.msg[0];
                    $('#item_name19').val(pr.name);
                    $('#order_item_unit_price19').val(pr.sales_price);
                     $("#order_item_quantity19").attr("placeholder", pr.amount);

                    //console.log(pr.name);  
               }
                });
                  
          });




              $(document).on('blur', '#item_barcod20', function(event){
              var barcode = $('#item_barcod20').val();

                  $.ajax({
                type:'GET',
                url:'/ajax/'+ barcode,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    // $("#item_name20").html(data[2]);
                    const pr = data.msg[0];
                    $('#item_name20').val(pr.name);
                    $('#order_item_unit_price20').val(pr.sales_price);
                     $("#order_item_quantity20").attr("placeholder", pr.amount);

                    //console.log(pr.name);
                   
               }
                    });   
          });




















          
                

                 $(document).on('blur', '#order_item_quantity1', function(event){
                   var amount = $(this).val();
                   var unit_price = $('#order_item_unit_price1').val();

                   var total_price = unit_price*amount ;
                   $("#order_item_total_price1").val(total_price);
                   final_total +=total_price;
                   $('#final_total_amt').val(final_total);

                   });



                 $(document).on('blur', '#order_item_quantity2', function(event){
                   var amount = $(this).val();
                   var unit_price = $('#order_item_unit_price2').val();

                   var total_price = unit_price*amount ;
                   $("#order_item_total_price2").val(total_price);
                    final_total +=total_price;
                    $('#final_total_amt').val(final_total);

                   });



                 $(document).on('blur', '#order_item_quantity3', function(event){
                   var amount = $(this).val();
                   var unit_price = $('#order_item_unit_price3').val();

                   var total_price = unit_price*amount ;
                   $("#order_item_total_price3").val(total_price);
                    final_total +=total_price;
                    $('#final_total_amt').val(final_total);

                   });



                 $(document).on('blur', '#order_item_quantity4', function(event){
                   var amount = $(this).val();
                   var unit_price = $('#order_item_unit_price4').val();

                   var total_price = unit_price*amount ;
                   $("#order_item_total_price4").val(total_price);
                    final_total +=total_price;
                    $('#final_total_amt').val(final_total);

                   });



                 $(document).on('blur', '#order_item_quantity5', function(event){
                   var amount = $(this).val();
                   var unit_price = $('#order_item_unit_price5').val();

                   var total_price = unit_price*amount ;
                   $("#order_item_total_price5").val(total_price);
                    final_total +=total_price;
                    $('#final_total_amt').val(final_total);

                   });



                 $(document).on('blur', '#order_item_quantity6', function(event){
                   var amount = $(this).val();
                   var unit_price = $('#order_item_unit_price6').val();

                   var total_price = unit_price*amount ;
                   $("#order_item_total_price6").val(total_price);
                    final_total +=total_price;
                    $('#final_total_amt').val(final_total);

                   });



                 $(document).on('blur', '#order_item_quantity7', function(event){
                   var amount = $(this).val();
                   var unit_price = $('#order_item_unit_price7').val();

                   var total_price = unit_price*amount ;
                   $("#order_item_total_price7").val(total_price);
                    final_total +=total_price;
                    $('#final_total_amt').val(final_total);

                   });



                 $(document).on('blur', '#order_item_quantity8', function(event){
                   var amount = $(this).val();
                   var unit_price = $('#order_item_unit_price8').val();

                   var total_price = unit_price*amount ;
                   $("#order_item_total_price8").val(total_price);
                    final_total +=total_price;
                    $('#final_total_amt').val(final_total);

                   });



                 $(document).on('blur', '#order_item_quantity9', function(event){
                   var amount = $(this).val();
                   var unit_price = $('#order_item_unit_price9').val();

                   var total_price = unit_price*amount ;
                   $("#order_item_total_price9").val(total_price);
                    final_total +=total_price;
                    $('#final_total_amt').val(final_total);

                   });




                 $(document).on('blur', '#order_item_quantity10', function(event){
                   var amount = $(this).val();
                   var unit_price = $('#order_item_unit_price10').val();

                   var total_price = unit_price*amount ;
                   $("#order_item_total_price10").val(total_price);
                    final_total +=total_price;
                    $('#final_total_amt').val(final_total);

                   });




                 $(document).on('blur', '#order_item_quantity11', function(event){
                   var amount = $(this).val();
                   var unit_price = $('#order_item_unit_price11').val();

                   var total_price = unit_price*amount ;
                   $("#order_item_total_price11").val(total_price);
                    final_total +=total_price;
                    $('#final_total_amt').val(final_total);

                   });



                 $(document).on('blur', '#order_item_quantity12', function(event){
                   var amount = $(this).val();
                   var unit_price = $('#order_item_unit_price12').val();

                   var total_price = unit_price*amount ;
                   $("#order_item_total_price12").val(total_price);
                    final_total +=total_price;
                    $('#final_total_amt').val(final_total);

                   });



                 $(document).on('blur', '#order_item_quantity13', function(event){
                   var amount = $(this).val();
                   var unit_price = $('#order_item_unit_price13').val();

                   var total_price = unit_price*amount ;
                   $("#order_item_total_price13").val(total_price);
                    final_total +=total_price;
                    $('#final_total_amt').val(final_total);

                   });



                 $(document).on('blur', '#order_item_quantity14', function(event){
                   var amount = $(this).val();
                   var unit_price = $('#order_item_unit_price14').val();

                   var total_price = unit_price*amount ;
                   $("#order_item_total_price14").val(total_price);
                    final_total +=total_price;
                    $('#final_total_amt').val(final_total);

                   });


                 $(document).on('blur', '#order_item_quantity15', function(event){
                   var amount = $(this).val();
                   var unit_price = $('#order_item_unit_price15').val();

                   var total_price = unit_price*amount ;
                   $("#order_item_total_price15").val(total_price);
                    final_total +=total_price;
                    $('#final_total_amt').val(final_total);

                   });



                 $(document).on('blur', '#order_item_quantity16', function(event){
                   var amount = $(this).val();
                   var unit_price = $('#order_item_unit_price16').val();

                   var total_price = unit_price*amount ;
                   $("#order_item_total_price16").val(total_price);
                    final_total +=total_price;
                    $('#final_total_amt').val(final_total);

                   });



                 $(document).on('blur', '#order_item_quantity17', function(event){
                   var amount = $(this).val();
                   var unit_price = $('#order_item_unit_price17').val();

                   var total_price = unit_price*amount ;
                   $("#order_item_total_price17").val(total_price);
                    final_total +=total_price;
                    $('#final_total_amt').val(final_total);

                   });


                 $(document).on('blur', '#order_item_quantity18', function(event){
                   var amount = $(this).val();
                   var unit_price = $('#order_item_unit_price18').val();

                   var total_price = unit_price*amount ;
                   $("#order_item_total_price18").val(total_price);
                    final_total +=total_price;
                    $('#final_total_amt').val(final_total);

                   });


                 $(document).on('blur', '#order_item_quantity19', function(event){
                   var amount = $(this).val();
                   var unit_price = $('#order_item_unit_price19').val();

                   var total_price = unit_price*amount ;
                   $("#order_item_total_price19").val(total_price);
                    final_total +=total_price;
                    $('#final_total_amt').val(final_total);

                   });


                 $(document).on('blur', '#order_item_quantity20', function(event){
                   var amount = $(this).val();
                   var unit_price = $('#order_item_unit_price20').val();

                   var total_price = unit_price*amount ;
                   $("#order_item_total_price20").val(total_price);
                    final_total +=total_price;
                    $('#final_total_amt').val(final_total);

                   });







                 // $(document).on('click','#final_total_amt',function(){
                 // for (i =1; i <= count; i++) { 
                 //  var final_total= 0;
               
                 // final_total += parseInt($('#order_item_total_price'+i).val());
                  

                 // }
                 // $(this).val(final_total);
                
                 // });


         




      // $('#order_date').datepicker({dateFormat:"DD/MM/YYYY"}).datepicker("setDate",new Date());

        $(function () {
             //Date picker
                $("#order_date").datepicker({
                 format: "yyyy-mm-dd",
                 autoclose: true


                });


              });


             function updateAmount(){
          
                var barcode = $('#item_barcod'+count).val();
                var amount  = $('#order_item_quantity'+count).val();

                  $.ajax({
                  type: 'PUT',
                  url:'/ajx/'+barcode+'/'+amount,
                  data:{'_token':'{{ csrf_token()}} ',
                     },
                      success:function(data){
                            // $("#item_name20").html(data[2]);

             
         
                      console.log(barcode);

                      

                         }
                  
                      
                         });

   }

          

        //   function createInvoic(){
        //     var customer_name = $("#order_receiver_name");
        //     var date =$("#order_date");
        //     var total = final_total;
        //     var invoice_no = $("#order_no");
        //   }
       
        // });


           // function myFunction(){

           //    for (i = 0; i < count; i++) {

           //      var barcode = $('#item_barcod'+count).val();
           //      var amount  = $('#order_item_quantity'+count).val();

           //        $.ajax({
           //        type: 'PUT',
           //        url:'/ajx/'+barcode+'/'+amount,
           //        data:{'_token':'{{ csrf_token()}} ',
           //           },
           //            success:function(data){
           //                  // $("#item_name20").html(data[2]);

             
         
           //            console.log(barcode);

                      

           //               }
                  
                      
           //               });
           //      }
           //    }
            });


        </script>


  @endsection
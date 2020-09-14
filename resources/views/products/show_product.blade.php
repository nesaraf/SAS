
@extends('layouts/app')

              @section('notif_amount')
             <?php 
               $notif =0;
               $low_amount=0;
               $low_date=0;
               $critical_date = 0;
              foreach($products as $product ){

       
                if($product->amount <= 10){
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
                    <a href="#">
                      <i class="fa fa-calendar " style="color:#ff0000;"></i> you have &nbsp<span style="color:#ff0000; text-decoration: underline;">'.$critical_date.' '.'</span>&nbsp items whit critical expiration date.
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-battery-1"  style="color:#cc6600;"></i> &nbsp<span style="color:#cc6600; text-decoration: underline;">'.$low_amount.'</span>&nbsp items whit low amount.
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="glyphicon glyphicon-calendar" style="color:#cc6600;"></i> there is &nbsp<span style="color:#cc6600; text-decoration: underline;">'.$low_date.'</span>&nbsp items whit low expiration date.
                    </a>
                  </li>
                </ul>
              </li>'
                



                ?>  


@section('headsection')
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@endsection



@section('main_content')

@include('products/editModal');



 <section class="content-header">
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



    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">products List</h3>

          <a   class="  col-lg-offset-5 col-sm-offset-4 btn btn-success" href="{{route('product.create')}}">add new product</a>
        

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

          




             <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">


          <!-- Modal -->

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Commercial_name</th>
                  <th>Exp date</th>
                  <th>Purchase price</th>
                  <th>Sales price</th>
                  <th>Category</th>
                  <th>Manufacturer</th>
                  <th>Amount</th>
                  <th>Unit</th>
                  <th>Image</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>


                 @foreach($products as $product )
              
                <tr>
                  <td>  {{  $product->name  }}      </td>
                  <td>  {{  $product->commercial_name }}  </td>
                  <td>  {{  $product->exp_date  }}     </td>
                  <td>  {{  $product->purchase_price }}     </td>
                  <td>  {{  $product->sales_price  }}   </td>
                  <td>  {{  $product->category-> name  }}   </td>
                  <td>  {{  $product->manufaturer  }}   </td>
                  <td>  {{  $product->amount  }}   </td>
                  <td>  {{  $product->unit->name  }}   </td>
                  <td>  <img src="{{Storage::disk('local')->Url($product->image) }}" style="height:20px; width:20px;">   </td>
                  <td> <span class="glyphicon glyphicon-edit" data-toggle="modal" data-target=".Edit-modal" onclick="getEditData({{$product->id}})"></span></td>

                  <form  id="delete-form-{{($product->id)}}"  action="{{route('product.destroy', $product->id)}}"
                   style="display:none"  method="post">
                   {{ csrf_field() }}
                   {{ method_field('DELETE') }}


                  </form>
                  <td><a href="" onclick="
                  if(confirm('are you sure, do you want to delete this product?')){
                  event.preventDefault();
                   document.getElementById('delete-form-{{$product->id}}').submit();
                   }


                   else{event.preventDefault();}">
                   <span class="glyphicon glyphicon-trash"></span> </a></td>
                </tr> 
                @endforeach 
                


                </tbody>
                <tfoot>
                <tr>
                   <th>Product Name</th>
                  <th>Commercial_name</th>
                  <th>Exp date</th>
                  <th>Purchase price</th>
                  <th>Sales price</th>
                  <th>Category</th>
                  <th>Manufacturer</th>
                  <th>Amount</th>
                  <th>Unit</th>
                  <th>Image</th>
                  <th>Edit</th>
                  <th>Delete</th>
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

  $('.Edit-modal').on('hidden.bs.modal', function () {
resetForm();
})

  function resetForm()
{   
                $('#InputBarcode').val('');
                $('#InputName').val('');
                $('#Cname').val('');
                $('#InputPurchasePrice').val('');
                $('#InputSalesPrice').val('');
                $('#datepicker').val('');
                $('#InputAmount').val('');
                $('#InputUnits option').remove();
                $('#category option').remove();
                $('#pre-img').attr('src','');
}


function getEditData(pid){

                  $.ajax({
                type:'GET',
                url:'EditProduct/'+ pid,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){

                   var prod = data.products[0];
                   
                  var currentCat=prod.category.name;
                  $('#category').append( "<option id='myOption' selected value="+prod.category.id+">"+currentCat+"</option>" )
                  // console.log(cats[0].name);
                    cats=data.categories;
                    cats.forEach( cat => {
                      $('#category').append( "<option>"+cat.name+"</option>" );

                    });
                  console.log($('#myOption').val());
                $('#InputId').val(prod.id);
                $('#InputBarcode').val(prod.barcode);
                    $('#Cname').val(prod.commercial_name);
                $('#InputName').val(prod.name);
                
                $('#InputPurchasePrice').val(prod.purchase_price);
                $('#InputSalesPrice').val(prod.sales_price);
                $('#datepicker').val(prod.exp_date);
                $('#InputAmount').val(prod.amount);

          var currentUnit=prod.unit.name;
                  $('#InputUnits').append( "<option id='cUnit' selected value="+prod.unit.id+">"+currentUnit+"</option>" )
                   units=data.units;
                    units.forEach( unit => {
                      $('#InputUnits').append( "<option value="+unit.id+">"+unit.name+"</option>" );

                    });

                $('#InputManufacturer').val(prod.manufaturer);



                  var imagename = prod.image;


               $('#pre-img').attr('src','http://127.0.0.1:8000/storage/images/'+imagename);
               //  $('#pre-img').append( '<img src="http://localhost/'+prod.image+'">')
               // src="{{Storage::disk('local')->Url($product->image) }}" style="height:20px; width:20px;">
                // $('#').val(data.);
                // $('#').val(data.);

 
               }
                    });  

};

$('#SubmitEdit').on('click',function(event){
     event.preventDefault();
                var updateid=$('#InputId').val();

                var bcode = $('#InputBarcode').val();
                var noom = $('#InputName').val();
                var cname = $('#Cname').val();
                var pp = $('#InputPurchasePrice').val();
                var sp = $('#InputSalesPrice').val();
                var dp = $('#datepicker').val();
                var meqdar = $('#InputAmount').val();
                var wahid = $('#InputUnits').val();
                var dasta = $('#category').val();
  console.log(updateid)

    $.ajax({
                type:'PUT',
                url:'UpdateProduct/'+ updateid,
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{
                  barcode:bcode,
                  name:noom,
                  commercial_name:cname,
                  purchase_price:pp,
                  salse_price:sp,
                  exp_date:dp,
                  amount:meqdar,
                  unit:wahid,
                  category:dasta,
                },
                success:function(data){
                     console.log(data); 

                   }
              });

});



</script>

@endsection
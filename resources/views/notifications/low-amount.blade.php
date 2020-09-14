
@extends('layouts/app')

              
              @section('notif_amount')
               @include('layouts.notifications')
               @endsection


@section('headsection')
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@endsection



@section('main_content')

@include('products/editModal')

 
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">products whit low amount</h3>
        

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

                 <?php 
              $amount = $product->amount;
              //$date1 = Date('2018-04-08');
                  ?>



                 @if ($amount <= 1000)
                  
                   
              
                <tr>
                  <td>  {{  $product->name  }}      </td>
                  <td>  {{  $product->commercial_name }}  </td>
                  <td>  {{  $product->exp_date  }}     </td>
                  <td>  {{  $product->purchase_price }}     </td>
                  <td>  {{  $product->sales_price  }}   </td>
                  <td>  {{  $product->category-> name  }}   </td>
                  <td>  {{  $product->manufaturer  }}   </td>
                  <td bgcolor="#FF8080">  {{  $product->amount  }}   </td>
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

                @endif
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
                $('#InputCommercialName').val('');
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
                $('#InputName').val(prod.name);
                $('#InputCommercialName').val(prod.commercial_name);

                // $('#category').val(data.);

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
                var cname = $('#InputCommercialName').val();
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
@extends('layouts/app')

              
              @section('notif_amount')
             @include('layouts.notifications')
               @endsection
               


@section('headsection')
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@endsection



@section('main_content')
<style>
    .action-Dd:hover{
        cursor:pointer;
    }
</style>

@include('products/editModal')
@include('products/details')



 <section class="content-header">
     
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
            
            <!-- /.box-header -->
            <div class="box-body">


          <!-- Modal -->

              <table id="Mydata" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Barcode</th>
                  <th>Product Name</th>
                  <th>Commercial_name</th>
                  <th>Exp date</th>
                  <!-- <th>Purchase price</th> -->
                  <th>Sales price</th>
                  <th>Category</th>
                  <th>Manufacturer</th>
<!--                   <th>Amount</th>
                  <th>Unit</th> -->
                  <th>Image</th>
                  <th>Action</th>

                </tr>
                </thead>
                <tbody id="tableBody">


            
              

               
                


                </tbody>
                <tfoot>
                <tr>
                   <th>Barcode</th>
                   <th>Product Name</th>
                  <th>Commercial_name</th>
                  <th>Exp date</th>
                 <!--  <th>Purchase price</th> -->
                  <th>Sales price</th>
                  <th>Category</th>
                  <th>Manufacturer</th>
<!--                   <th>Amount</th>
                  <th>Unit</th>
 -->                  <th>Image</th>
                  <th>Action</th>
                  
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->

      
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
         abc
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
             var filename = '';
    
     		var mytable = $('#Mydata').DataTable( {
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url":"<?= route('LoadData') ?>",
					"dataType":"json",
					"type":"POST",
					"data":{"_token":"<?= csrf_token() ?>"}
				},
				"columns":[
                  
					{"data":"barcode"},
					{"data":"name"},
					{"data":"commercial_name"},
					{"data":"exp_date"},
					// {"data":"purchase_price"},
					{"data":"sales_price"},
					{"data":"category"},
					{"data":"manufacturer"},
					// {"data":"amount"},
					// {"data":"unit"},
					{"data":"image"},
					{"data":"action","searchable":false,"orderable":false}
				],
			} );
    
$(document).on( "load",mytable);

    $("#newFileInput").change(function (){
       var fileName = $(this).prop('files')[0].name;
       $("#selectedfile").html(fileName+'<strong> SELECTED </strong>');
       $("#selectedfile").show();
       $('.noFile').hide();
        $('#SubmitEdit').show();
     });

    
    

// Close Edit modal Events

  $('.Edit-modal').on('hidden.bs.modal', function () {
resetForm();
      $('#pre-img').show();
      $('.chooseFile').hide();
})

    // DELETE
  function setDeleteId(id){
    var Did = id;
    $('#DELETEMODAL').modal('show')
    $('#confirmed').on('click', function () {
      deleteProduct(Did);
    })

  }

function deleteProduct(id){
            $.ajax({
                type:'DELETE',
                url:'deleteprod/'+id,
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success:function(data){
                        id='';
                    $('#DELETEMODAL').modal('hide')
                    mytable.ajax.reload();
                     swal({
                        title:"فایل حذف شد",
                        icon:"success",
                        button:false,
                        timer: 1000,
                    });
                }
              })

}
    
    // reset form

  function resetForm()
{   
                $('#InputBarcode').val('');
                $('#InputName').val('');
                $('#InputCommercialName').val('');
                $('#InputPurchasePrice').val('');
                $('#InputSalesPrice').val('');
                $('#datepicker').val('');
                $('#InputAmount').val('');
                $('#Filename').val('');
                $('#newFileInput').val('');
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
                    filename = prod.image;
                   
                  var currentCat=prod.category.name;
                  $('#category').append( "<option selected value="+prod.category.id+">"+currentCat+"</option>" )
                  // console.log(cats[0].name);
                    cats=data.categories;
                    cats.forEach( cat => {
                      $('#category').append( "<option>"+cat.name+"</option>" );

                    });
                    console.log(prod);
                  
                $('#InputId').val(prod.id);
                $('#InputBarcode').val(prod.barcode);
                $('#p-barcode').text(prod.barcode);
                $('#InputName').val(prod.name);
                $('#p-name').text(prod.name);
                $('#p-c_name').text(prod.commercial_name);

                // $('#category').val(data.);
              

                $('#InputPurchasePrice').val(prod.purchase_price);
                $('#Cname').val(prod.commercial_name);
                $('#p-puchaseprice').text(prod.purchase_price);
                $('#p-salesprice').text(prod.sales_price);
                $('#p-category').text(currentCat);
                $('#p-ex_date').text(prod.exp_date);
                $('#p-amount').text(prod.amount);
                $('#p-unit').text(prod.unit.name);
                $('#p-manufacturer').text(prod.manufaturer);
                $('#InputSalesPrice').val(prod.sales_price);
                $('#datepicker').val(prod.exp_date);
                $('#InputAmount').val(prod.amount);
                $('#Filename').val(filename);

          var currentUnit=prod.unit.name;
                  $('#InputUnits').append( "<option id='cUnit' selected value="+prod.unit.id+">"+currentUnit+"</option>")
                   units=data.units;
                    units.forEach( unit => {
                      $('#InputUnits').append( "<option value="+unit.id+">"+unit.name+"</option>" );

                    });

                $('#InputManufacturer').val(prod.manufaturer);



                  var imagename = prod.image;


               $('#pre-img').attr('src','http://127.0.0.1:8000/storage/images/'+imagename);

                 $('#p-pre-img').attr('src','http://127.0.0.1:8000/storage/images/'+imagename);
 
               }
                    });  

};
    
//    Change File
    
    $('#removefile').on('click', function(){
    $('#newFileInput').click();
//        $('#uploadfile').show();
//           $('#changeFile').hide();
        $('#pre-img').hide();
        $(".changeFbtn").hide();
        $('#SubmitEdit').hide();
        $('.chooseFile').show();
        $('.noFile').show();
//        $('#imageName').show();
         $.ajax({
                type:'GET',
                url:'FileDelete/'+filename,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    filename = '';
                    $('#Filename').val('');

                    
                }
             
        
         })
        
    })
  
//    
//    $('#uploadfile').on('click',function(event){
//        
//        event.preventDefault();
//        var filedata = $('#newFileInput').prop('files')[0];
//        var fd = new FormData();
//        fd.append('file',filedata);
//        
//            $.ajax({
//                type:'POST',
//                url:'Upload',
//                headers: {
//                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//                data:fd,
//                cache: false, 
//                processData: false,
//                success:function(data){
//                    swal({
//                        title:"انجام شد",
//                        text:"فایل آپدیت موفقانه آپدیت گردید",
//                        icon:"success",
//                        button:false,
//                        timer: 1000,
//                    });
//                
//
//                   }
//              });
//        
//    }) 
    
    
// Submit Edit
$('#dataForm').on('submit',function(event){

                   event.preventDefault(); 


    $.ajax({
                type:'POST',
                url:'UpdateProduct/',
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:new FormData($('#dataForm')[0]),
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
                    mytable.ajax.reload();
                    $('.Edit-modal').modal('hide');
                    resetForm();
                    $('.chooseFile').hide();
                    $("#selectedfile").hide();
                    $(".changeFbtn").show();
                   }
              });


});


        </script>


@endsection
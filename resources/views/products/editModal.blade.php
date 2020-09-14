<div class="modal fade Edit-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
       <form role="form"   method="post" enctype="multipart/form-data" id = "dataForm">

            	{{csrf_field()}}
              <div class="box-body">

              	<div class="col-lg-6">

                  <div class="form-group" style="display: none;">
                    <label for="name">Id</label>
                    <input type="text" name="id" class="form-control" id="InputId" placeholder="Product Barcode">
                  </div>

                <div class="form-group">
                    <label for="name">Barcode</label>
                    <input type="text" name="barcode" class="form-control" id="InputBarcode" placeholder="Product Barcode">
                  </div>
                  

	                <div class="form-group">
	                  <label for="name">Name</label>
	                  <input type="text" name="name" class="form-control" id="InputName" placeholder="Product Name">
	                </div>
                    
                    
                    <div class="form-group">
                        <lable for="Cname">Commercial Name</lable>
                        <input type="text" name="commerical_name" class="form-control" id="Cname" placeholder="Commerical Name">
                    </div>
                    
                    

	                 <div class="form-group">
	                  <label for="category">Category</label>
	                  <select  name="category" class="form-control" id="category">

	                
	                  	<option value="" id="selectedCat" selected=""></option>

	                 
	           
	                  	</select>

	                </div>


	                <div class="form-group">
	                  <label for="purchasePrice">Purchase Price</label>
	                  <input type="text" name="purchase_price" class="form-control" id="InputPurchasePrice" placeholder="Purchase Price" pattern="[1-9]+" title="please enter number only">
	                </div>


	                 
	                <div class="form-group">
	                  <label for="salesPrice">Sales Price</label>
	                  <input type="text" name="sales_price" class="form-control" id="InputSalesPrice" placeholder="Sales Price" pattern="[1-9]+" title="please enter number only">
	                </div>



                </div>



                <div class="col-lg-5 offset-col-lg-1" >



                  <div class="form-group">
                    <label>Exp date:</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker" name="exp_date">
                    </div>
                        <!-- /.input group -->
                    </div>





                  <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="text" name="amount" class="form-control" id="InputAmount" placeholder="amount" pattern="[1-9]+" title="please enter number only">
                  </div> 




                  <div class="form-group">
                    <label for="exampleInputEmail1">Unit</label>
                    <select name="unit" class="form-control" id="InputUnits">

                     
                    

                   
                      
                      </select>

                  </div>
                  


                  <div class="form-group">
                    <label for="manufacturer">Manufacturer</label>
                    <input type="text" name="manufaturer" class="form-control" id="InputManufacturer" placeholder="Manufacturer">
                  </div> 
                    
                    <div class="form-group" style="display:none">
                    <label for="amount">File Name</label>
                    <input type="text" name="filename" class="form-control" id="Filename" placeholder="amount">
                  </div> 


                  <div class="row">
                        <div class="col-md-6">
                        <img id="pre-img" height="180px" width="180px">
                            <p style="display:none" id="selectedfile"></p>
                        </div>
                        
                        <div class="col-md-6">
                            <a class="btn btn-warning changeFbtn"  data-toggle="modal" data-target = "#Changefile" id="changeFile">Change image</a>
                            <a class="btn btn-info chooseFile" style="display:none;"  data-toggle="modal" data-target = "#Changefile" id="changeFile">Choose image</a>
                            
<!--                            <a class="btn btn-danger"  id="uploadfile" style="display:none">Upload</a>-->
                            <input type="file" style="display:none;" id="newFileInput" name="picture">
                        </div>
                    </div>
                           

	              </div>
	              <!-- /.box-body -->



                </div>
	              <div class="box-footer">
                      <p class = "noFile" style="display:none;color:red;">Choose an image to submit the form</p>
	                <button type="submit"   class="btn btn-primary" id="SubmitEdit" style="float:right">Save</button>
	              </div>


            </form>
    </div>
  </div>
</div>
<!-- DELETE MODAL -->
<div class="modal fade" id="DELETEMODAL" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
      </div>
      <div class="modal-body">
        Do you want to delete this item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger" id = "confirmed">Yes</button>
      </div>
    </div>
  </div>
</div>
<!--/////////////// CONFIRM FILE CHANGE-->
<div class="modal fade" id="Changefile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirm File change</h4>
      </div>
      <div class="modal-body">
        If you click yes the previous file will be deleted!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger" id="removefile" data-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>
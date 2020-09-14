<div class="modal fade Edit-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form role="form"  method="post" enctype="multipart/form-data" id="EditForm" >

            	{{csrf_field()}}
              <div class="box-body">

              	<dev class="col-lg-6">

                  <div class="form-group" style="display:none;">
                    <input type="text" name="id" class="form-control" id="Iid">
                  </div>
                    
                    <div class="form-group">
                    <label for="name">First name</label>
                    <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name">
                  </div>
                  

	                <div class="form-group">
	                  <label for="name">Last Name</label>
	                  <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name">
	                </div>


	                 
	                <div class="form-group">
	                  <label for="commercialName">Father Name</label>
	                  <input type="text" name="fathername" class="form-control" id="fathername" placeholder="Father Name">
	                </div>

	                 <div class="form-group">
	                  <label for="category">Date Of Birth</label>
                    <div class="form-group date">
                       <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                     <input type="text" name="dob" class="form-control" id="datepicker" placeholder="Date Of Birth">
</div>
	                </div>


	                <div class="form-group">
	                  <label for="purchasePrice">Email</label>
	                  <input type="email" name="email" class="form-control" id="email" placeholder="Email">
	                </div>


	                 
	                <div class="form-group">
	                  <label for="salesPrice">Mobile</label>
	                  <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile" pattern="[700][0-9]{9}">
	                </div>



                </dev>



                <dev class="col-lg-5 offset-col-lg-1" >



                  <div class="form-group">
                    <label>Phone</label>

                    <div class="input-group">

                      <input type="text" class="form-control pull-right"  name="phone" pattern="[700][0-9]{9}" id="phone">
                    </div>
                        <!-- /.input group -->
                    </div>





                  <div class="form-group">
                    <label for="amount">Position</label>
                    <input type="text" name="position" class="form-control" id="position" placeholder="Position">
                  </div> 
                  


                  <div class="form-group">
                    <label for="manufacturer">Academic Degree</label>
                    <input type="text" name="degree" class="form-control" id="degree" placeholder="Academic Degree">
                  </div> 



	<!--                 <div class="form-group">
	                  <label for="image">File input</label>
	                  <input type="file"   name="image" id="InputImage">

	                  <p class="help-block">Example block-level help text here.</p>
	                </div> -->


	              </div>
	              <!-- /.box-body -->

	              <div class="box-footer">
	                <button type="submit"   class="btn btn-primary">Save</button>
	              </div>

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
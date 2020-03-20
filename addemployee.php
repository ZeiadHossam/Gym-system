<div class="modal fade" id="modal-employee">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add employee</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
				<div class="row">
				
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              
          
              <form role="form" action="addmember.php" enctype="multipart/form-data" method="post">
                <div class="card-body">
				<div class="row">
				 <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                  </div>
				  <div class="form-group">
                    <label for="fname">*First Name</label>
                    <input type="text" class="form-control" maxlength="15" placeholder="First Name" required>
                  </div>
				  <div class="form-group">
                    <label for="fname">*Last Name</label>
                    <input type="text" class="form-control" maxlength="15" placeholder="Last Name" required>
                  </div>
				  <div class="form-group">
                    <label for="fname">user Name</label>
                    <input type="text" class="form-control"  placeholder="user name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"required>
                  </div>
				    <div class="form-group">
                    <label for="exampleInputEmail1">date added </label>
                    <input type="date" class="form-control"   required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">PersonalImage</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="img" class="form-control-file" type="file" id="img" accept="image/gif, image/jpeg, image/png"/ required>
                      </div>
                      
                    </div>
                  </div>
				  
				
				  
				 
				 
				  </div>
				  
				 <div class="col-md-6">
				 
				  
				  <div class="form-group">
				   <label >*department </label>
				 
                                            <select class="form-control">
                                               
                                                <option>trainer</option>
                                                <option>sales</option>
                                                <option>admin</option>
                                            </select>
                    
					
                  </div>
				 
				   
				  
				  
				  
				 <div class="form-group">
				 <label >*gender </label>
				 
                                            <select class="form-control">
                                               
                                                <option>male</option>
                                                <option>female</option>
                                                <option></option>
                                            </select>
                                        </div>
										<br>
										
				   <div class="form-group">
                    <label for="exampleInputEmail1">HOME phone</label>
                    <input type="text" class="form-control" maxlength="8"  placeholder="home phone" required>
                  </div>
				  <br>
				 
				
                 
				 <div class="form-group">
                    <label for="exampleInputEmail1">*phone number</label>
                    <input type="text" class="form-control" maxlength="10"  placeholder="phone number" required>
                  </div>
				   <div class="form-group">
                    <label for="exampleInputEmail1">*birthday </label>
                    <input type="date" class="form-control"   required>
                  </div>
				  
				 
				 
				   
				 
                  
				  
                </div>
                </div>
                </div>

              </form>
            </div>
		</div>
		</div>
	</div>
			 </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Add Member</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
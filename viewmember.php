<?php include("shared/main.php") ?>
			<div class="container-fluid">
				<div class="row">
				
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              
          
              <form role="form"  action="viewmember.php" enctype="multipart/form-data" method="post">
                <div class="card-body">
				<div class="row">
				 <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" value=<?php echo "@hotmail.com"?> readonly>
                  </div>
				  <div class="form-group">
                    <label for="fname">*First Name</label>
                    <input type="text" class="form-control" value=<?php echo "ahmed"?> readonly>
                  </div>
				  <div class="form-group">
                    <label for="fname">*Last Name</label>
                    <input type="text" class="form-control" value=<?php echo "@yasse"?> readonly>
                  </div>
                 
                
				  
				 <b> *Personal Address</b>
				  <br>
				  <div class="form-group">
                    
					<textarea  rows="6" cols="30" readonly > <?php echo "tagmo3elkhames"?>
					</textarea>
                  </div>
				  <div class="form-group">
                    <label >work phone</label>
                    <input type="text" class="form-control"  value=<?php echo "01015"?> readonly>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">fax number</label>
                    <input type="text" class="form-control"  value=<?php echo"225855" ?> readonly >
                  </div>
				     
				 <div class="form-group">
                    <label for="exampleInputEmail1">*phone number</label>
                    <input type="text" class="form-control"  value=<?php echo "@hotmail.com"?> readonly>
                  </div>
				  
				  <br>
				  </div>
				  
				 <div class="col-md-6">
				  <b> Company Address</b>
				  <br>
				  <div class="form-group">
                    
					<textarea  rows="6" cols="30" readonly><?php echo "@hotmail.com"?>
					</textarea>
                  </div>
				  <div class="form-group">
                    <label for="fname">*Birthday </label>
                    <input type="date" class="form-control"  readonly>
                  </div>
				  
				
				  <b>*Gender</b>
				  
				  
				 <div class="form-group">
				 
                                            <select class="form-control">
                                                <option class="hidden"  selected disabled>gender </option>
                                                <option disabled>male</option>
                                                <option disabled>female</option>
                                                <option></option>
                                            </select>
                                        </div>
										<br>
										 <b>Marriedstatus</b>
				  
				  
				 <div class="form-group">
				 
                                            <select class="form-control" >
                                                <option class="hidden" >single </option>
                                                <option disabled>married</option>
                                                <option disabled>divorsed</option>
                                                <option disabled></option>
                                            </select>
                                        </div>
										
				   <div class="form-group">
                    <label for="exampleInputEmail1">HOME phone</label>
                    <input type="text" class="form-control"value=<?php echo "25888"?> readonly >
                  </div>
				  <br>
				  <div class="form-group">
                    <label for="exampleInputEmail1">emergency number</label>
                    <input type="text" class="form-control"   value=<?php echo "0144444444"?> readonly>
                  </div>
              
				 
				   
				 
                  
				  
                </div>
                </div>
                </div>
              </form>
					<a href="membercontract.php" class="btn btn-sm btn-info">View Member Contracts</a>
				<a href="javascript:history.go(-1)" class="btn btn-sm btn-default">Close</a>
            </div>
		</div>
		</div>
	</div>
			<?php include("shared/footer.php") ?>
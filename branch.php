<?php include ("shared/main.php")?>
<section class="content">
 
        <div class="container-fluid">
            <br> 
			
						<form  role="form"  action="backend/controllingbranch.php" method="get">
                <div class="card-body">
				<div class="form-group row">
                    <label for="Bransh Name" class="col-sm-2 col-form-label">Branch Name:</label>
                    <div class="col-sm-10">
                      <input type="Text" name="branchName" class="form-control" required>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="Branch Address" class="col-sm-2 col-form-label">Branch Address:</label>
                    <div class="col-sm-10">
                      <input type="Text" name="branchAddress" class="form-control" required>
                    </div>
                  </div>
				   <div class="btn-group tablebuttons">
                                <button type="submit" name="addbranch" class="btn btn-success btn-flat ">Confirm</button>
                                <button type="reset" class="btn btn-danger btn-flat ">Clear Fields</button>
				  
				    </div>
					</form> 
					<br>
					<br>
		<div class="row">
			<table id="custTable" class="addmembertable table table-bordered table-striped">
				<thead>
					<tr>
						<th>Package</th>
						
					    <th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Branch1</td>
						
						<td>
							 <div class="btn-group tablebuttons">
                                <button type="button" class="btn btn-info">Edit</button>
                                
                                <button type="button" class="btn btn-danger btn-sm ">Delete</button>
                            </div>
						</td>
					</tr>
					<tr>
						<td>Branch2</td>
						
						<td>
							 <div class="btn-group tablebuttons">
                                <button type="button" class="btn btn-info">Edit</button>
                                
                                <button type="button" class="btn btn-danger btn-sm ">Delete</button>
                            </div>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
				  </div>
				  
				  
 </div>			
</section>
<?php include ("shared/footer.php")?>

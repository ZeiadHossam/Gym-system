<?php include ("shared/main.php")?>
<section class="content">
 
        <div class="container-fluid">
            <br> 
			
						<form  role="form"  action="#" method="post">
                <div class="card-body">
				<div class="form-group row">
                    <label for="Department Name" class="col-sm-2 col-form-label">Department Name:</label>
                    <div class="col-sm-10">
                      <input type="Text" class="form-control" required>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="Privileges" class="col-sm-2 col-form-label">Privileges:</label>
					<div class="col-sm-2 offset-sm-1">
				  <input class="form-check-input" type="checkbox">Reciption
				  <br>
				  <input class="form-check-input" type="checkbox">Notifications
				  <br>
				  <input class="form-check-input" type="checkbox">Members
				  <br>
				  <input class="form-check-input" type="checkbox">Emloyees
				  
				  </div>
				  <div class="col-sm-2">
				  <input class="form-check-input" type="checkbox">Contracts
				  <br>
				  <input class="form-check-input" type="checkbox">Administration
				  <br>
				  <input class="form-check-input" type="checkbox">Reports 
				  </div>
				  </div>
				  </div>
				   <div class="btn-group tablebuttons">
                                <button type="submit" class="btn btn-success btn-flat ">Confirm</button>
                                <button type="reset" class="btn btn-danger btn-flat ">Clear Fields</button>
				  
				    </div>
					</form> 
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
						<td>Department1</td>
						
						<td>
							 <div class="btn-group tablebuttons">
                                <button type="button" class="btn btn-info">Edit
                                
                                </button>
                                
                                <button type="button" class="btn btn-danger btn-sm ">Delete</button>
                            </div>
						</td>
					</tr>
					<tr>
						<td>Department2</td>
						
						<td>
							 <div class="btn-group tablebuttons">
                                <button type="button" class="btn btn-info">Edit
                                
                                </button>
                                
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

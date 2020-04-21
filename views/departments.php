<?php include ("../shared/main.php");?>
<section class="content">
 
        <div class="container-fluid">
            <br> 
			
						<form role="form" action="../Controller/usertype_controller.php" method="get">
                <div class="card-body">
				<div class="form-group row">
                    <label for="Department Name" class="col-sm-2 col-form-label">Department Name:</label>
                    <div class="col-sm-10">
                      <input type="Text" name="depName" class="form-control" required>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="Privileges" class="col-sm-2 col-form-label">Privileges:</label>
					<div class="col-sm-2 offset-sm-1">
				  <input class="form-check-input" name="receptionCheck" type="checkbox">Reciption
				  <br>
				  <input class="form-check-input" name="notificationCheck" type="checkbox">Notifications
				  <br>
				  <input class="form-check-input" name="membersCheck" type="checkbox">Members
				  <br>
				  <input class="form-check-input" name="employeesCheck" type="checkbox">Emloyees
				  
				  </div>
				  <div class="col-sm-2">
				  <input class="form-check-input" name="contractsCheck" type="checkbox">Contracts
				  <br>
				  <input class="form-check-input" name="adminCheck" type="checkbox">Administration
				  <br>
				  <input class="form-check-input"  name="reportsCheck" type="checkbox">Reports
				  </div>
				  </div>
				  </div>
				   <div class="btn-group tablebuttons">
                                <button type="submit" name="addDepartment" class="btn btn-success btn-flat ">Confirm</button>
                                <button type="reset" class="btn btn-danger btn-flat ">Clear Fields</button>
				  
				    </div>
					</form> 
					<br>
		<div class="row">
			<table id="custTable" class="addmembertable table table-bordered table-striped">
				<thead>
					<tr>
						<th>Type</th>
						
					    <th>Actions</th>
					</tr>
				</thead>
				<tbody>
                <?php
                foreach ($gym->getUserTypes() as $department) {
                ?>
					<tr>
						<td><?php echo $department->getName();?></td>
						
						<td>
							 <div class="btn-group tablebuttons">
                                <button type="button" class="btn btn-info">Edit
                                
                                </button>
                                
                                <button type="button" class="btn btn-danger btn-sm ">Delete</button>
                            </div>
						</td>
					</tr>
     <?php }?>
				</tbody>
			</table>

		</div>
				  </div>
				  
				  
 </div>			
</section>
<?php include ("../shared/footer.php");?>

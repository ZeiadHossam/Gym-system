<?php include("../shared/main.php");?>
<?php include("addemployee.php");?>
<?php include("delete.php") ;?>
 <section class="content">
	<div class="container-fluid">
		<br>
        <legend>Employees</legend>

        <div class="row empimage">
		</div>	
		<div class="row">
			<button type="button" class="btn btn-info Addmemberbutton" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modal-employee">
				Add Employee
			</button>
		</div>
		<br>
		<div class="row">
			<table id="custTable" class="addmembertable table table-bordered table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Department</th>
                        <?php
                            if ($_SESSION['branch']==NULL){
                                ?>
						<th>Branch Name(area)</th>
                               <?php } ?>
						<th>Mobile Phone</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
                <?php
                if ($_SESSION['branch']==NULL){
                    foreach ($gym->getBranchs() as $branch){
                    foreach ($branch->getEmployees() as $employee){
                        ?>
					<tr>
						<td><?php echo $employee->getId() ; ?></td>
						<td><?php echo $employee->getFirstName() ; ?></td>
						<td><?php echo $employee->getLastName() ; ?></td>
						<td><?php echo $employee->getUsertype()->getName() ; ?></td>
						<td><?php echo $branch->getCity(); ?></td>


                        <td><?php echo $employee->getMobilePhone() ; ?></td>
						<td>
							<div class="btn-group tablebuttons">
                                <a href="viewemployee.php" class="btn btn-secondary btn-sm" >View</a>
                                <a href="editemployee.php" class="btn btn-info btn-sm" >Edit</a>
                                <button type="button" onclick="deletingEmployee(<?php echo $employee->getId();?>)" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
								</button>
							</div>
						</td>
					</tr>
                        <?php }}}  else{
                    foreach ($gym->getBranchs()[$_SESSION['branch']]->getEmployees() as $employee){
                    ?>

                    <tr>
                        <td><?php echo $employee->getId() ; ?></td>
                        <td><?php echo $employee->getFirstName() ; ?></td>
                        <td><?php echo $employee->getLastName() ; ?></td>
                        <td><?php echo $employee->getUsertype()->getName() ; ?></td>
                        <td><?php echo $employee->getMobilePhone() ; ?></td>
                        <td>
                            <div class="btn-group tablebuttons">
                                <a href="viewemployee.php" class="btn btn-secondary btn-sm" >View</a>
                                <a href="editemployee.php" class="btn btn-info btn-sm" >Edit</a>

                                <button type="button" onclick="deletingEmployee(<?php echo $employee->getId();?>)" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>


                <?php } } ?>

				</tbody>
			</table>

		</div>
	</div>
</section>

<?php include("../shared/footer.php");?>
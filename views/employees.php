<?php include("../shared/main.php")?>
<?php include("addemployee.php")?>
<?php include("delete.php") ?>
 <section class="content">
	<div class="container-fluid">
		<br>
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
						<th>Mobile Phone</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>100</td>
						<td>mahmoud</td>
						<td>omar</td>
						<td>Sales</td>
						<td>01111111111</td>
						<td>
							<div class="btn-group tablebuttons">
                                <a href="viewemployee.php" class="btn btn-secondary btn-sm" >View</a>
                                <a href="editemployee.php" class="btn btn-info btn-sm" >Edit</a>
								<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete">
									Delete
								</button>
							</div>
						</td>
					</tr>
					<tr>
						<td>200</td>
						<td>amr</td>
						<td>khaled</td>
						<td>Reception</td>
						<td>01222222222</td>
						<td>
							<div class="btn-group tablebuttons">
								<a href="viewemployee.php" class="btn btn-secondary btn-sm" >View</a>
                                <a href="editemployee.php" class="btn btn-info btn-sm" >Edit</a>
								<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete">
									Delete
								</button>
							</div>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
	</div>
</section>

<?php include("../shared/footer.php")?>
<?php include("shared/main.php")?>
<?php include("addemployee.php")?>
<?php include("viewemployee.php")?>
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
                                <button class="btn btn-info" data-backdrop="static" data-keyboard="false"
                                        data-toggle="modal" data-target="#viewemployee">View
                                </button>
								<button type="button" class="btn btn-info btn-sm ">Edit</button>
								<button type="button" class="btn btn-danger btn-sm ">Delete</button>
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
								<button type="button" class="btn btn-secondary btn-sm ">View</button>
								<button type="button" class="btn btn-info btn-sm ">Edit</button>
								<button type="button" class="btn btn-danger btn-sm ">Delete</button>
							</div>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
	</div>
</section>

<?php include("shared/footer.php")?>
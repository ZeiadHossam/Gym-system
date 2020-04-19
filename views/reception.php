<?php include ("../shared/main.php") ?>
 <section class="content">
	<div class="container-fluid">
		<br>
		<div class="row receptionimage">
		</div>
		<br>
		<div class="row">
			<table id="custTable" class="addmembertable table table-bordered table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Member ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Mobile Phone</th>
						<th>Package</th>
						<th>Type</th>
						<th>Due</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1000</td>
						<td>1</td>
						<td>mahmoud</td>
						<td>omar</td>
						<td>01111111111</td>
						<td>MemberShip</td>
						<td>30 Days</td>
						<td>200</td>
						<td>
							<div class="btn-group tablebuttons">
								<button type="button" class="btn btn-success btn-sm toastrDefaultSuccess">Sign-in</button>
								<a href="viewcontract.php" class="btn btn-secondary btn-sm ">View</a>
							</div>
						</td>
					</tr>
					<tr>
						<td>2000</td>
						<td>2</td>
						<td>amr</td>
						<td>khaled</td>
						<td>01222222222</td>
						<td>Trainer</td>
						<td>15 Session</td>
						<td>150</td>
						<td>
							<div class="btn-group tablebuttons">
								<button type="button" class="btn btn-success btn-sm toastrDefaultSuccess">Sign-in</button>
								<a href="viewcontract.php" class="btn btn-secondary btn-sm ">View</a>
							</div>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
	</div>
</section>

<?php include ("../shared/footer.php") ?>

<?php include ("../shared/main.php") ?>
<?php include ("viewnotification.php") ?>
 <section class="content">
	<div class="container-fluid">
		<br>
        <legend>Notifications</legend>

        <div class="row notificationimage">
		</div>
		<br>
		<div class="row">
			<table id="custTable" class="addmembertable table table-bordered table-striped">
				<thead>
					<tr>
						<th>Title</th>
						<th>Message</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Birthday</td>
						<td>mahmoud's birthDay</td>
						<td>
							
						<button type="button" class="btn btn-block btn-secondary btn-sm" data-backdrop="static" data-toggle="modal" data-target="#viewnotification">
							View
						</button>
						</td>
					</tr>
					<tr>
						<td>member expiry</td>
						<td>mahmoud's Contract is about to expire</td>
						<td>
							<button type="button" class="btn btn-block btn-secondary btn-sm" data-backdrop="static" data-toggle="modal" data-target="#viewnotification">
								View
							</button>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
	</div>
</section>
<?php include ("../shared/footer.php") ?>

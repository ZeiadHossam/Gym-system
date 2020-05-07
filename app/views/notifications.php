<?php include ("viewnotification.php");
$notifications=$data["notifications"];
?>
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
					<tr class="notif">
						<th>Title</th>
						<th>Message</th>
					</tr>
				</thead>
				<tbody>
                <?php foreach ($notifications as $notification){?>
					<tr class="notif">
						<td><?php echo $notification->getTitle(); ?></td>
						<td><?php echo  $notification->getMessege(); ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>

		</div>
	</div>
</section>

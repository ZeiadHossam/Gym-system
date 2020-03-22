<?php include ("shared/main.php") ?>
<section class="content">

	<div class="container-fluid">
		<br>
		<form  role="form" action="salesreports.php" target="_blank" method="post">
			<fieldset>
				<legend>Search Report</legend>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Employee ID:</label>
					<div class="col-sm-2">
						<input type="Text" class="form-control" >
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-sm-2 col-form-label">First Name:</label>
					<div class="col-sm-4">
						<input type="Text" class="form-control" >
					</div>
					<label class="col-sm-2 col-form-label">Last Name:</label>
					<div class="col-sm-4">
						<input type="Text" class="form-control" >
					</div>
				</div>

				<div class="form-group row">
					<button type="submit" class="col-sm-2 offset-sm-8 btn btn-info">Generate report</button>
					<button type="reset" class="col-sm-2 btn btn-danger">Clear Fields</button>
				</div>

			</fieldset>
		</form>
	</div>
</section>
<?php include ("shared/footer.php") ?>

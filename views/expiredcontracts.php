<?php include ("../shared/main.php") ?>
<section class="content">

	<div class="container-fluid">
		<br>
		<form  role="form" action="expiredcontractreports.php" target="_blank" method="post">
			<fieldset>
				<legend>Search Report</legend>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Contract ID:</label>
							<input type="Text" class="form-control" >
						</div>
					</div>
					<div class="col-md-6">

						<div class="form-group">
							<label>Member ID:</label>
							<input type="Text" class="form-control" >
						</div>
					</div>

				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>First Name:</label>
							<input type="Text" class="form-control" >
						</div>
					</div>
					<div class="col-md-6">

						<div class="form-group">
							<label>Last Name:</label>
							<input type="Text" class="form-control" >
						</div>
					</div>

				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Contract Type:</label>
							<select id="contracts" size="4" class="form-control" multiple>
								<option value="Trainer">Volvo</option>
								<option value="Membership">Saab</option>

							</select>
						</div>
					</div>
					<div class="col-md-6">

						<div class="form-group">
							<label>Package Type:</label>
							<select id="packages" size="4" class="form-control" multiple>
								<option value="type1">10 Session</option>
								<option value="type2">20 Session</option>

							</select>
						</div>
					</div>

				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Membership Expires From:</label>
							<input type="date" class="form-control" >
						</div>
					</div>
					<div class="col-md-6">

						<div class="form-group">
							<label>Membership Expires To:</label>
							<input type="date" class="form-control" >
						</div>
					</div>

				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Contract Date From:</label>
							<input type="date" class="form-control" >
						</div>
					</div>
					<div class="col-md-6">

						<div class="form-group">
							<label>Contract Date To:</label>
							<input type="date" class="form-control" >
						</div>
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
<?php include ("../shared/footer.php") ?>

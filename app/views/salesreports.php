<section class="content">
	<div class="container-fluid">
		<br>
		<form  role="form" action="/GYM/report/salesReport" target="_blank" method="post">
			<fieldset>
				<legend>Search sales Report</legend>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Employee ID:</label>
					<div class="col-sm-2">
						<input type="Text" onkeypress="return onlyNumberKey(event)" name="empId" class="form-control" >
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-sm-2 col-form-label">First Name:</label>
					<div class="col-sm-4">
						<input type="Text" name="fName" class="form-control" >
					</div>
					<label class="col-sm-2 col-form-label">Last Name:</label>
					<div class="col-sm-4">
						<input type="Text" name="lName" class="form-control" >
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

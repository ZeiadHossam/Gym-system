<section class="content">

	<div class="container-fluid">
		<br>
		<form  role="form" action="/GYM/report/contractsReport" target="_blank" method="post" onsubmit="return validate_ContractReport()">
			<fieldset>
				<legend>Search Contracts Report</legend>
				<div class="row">
				<div class="col-md-6">
				<div class="form-group">
					<label>Contract ID:</label>
					<input type="Text" onkeypress="return onlyNumberKey(event)" name="contractId" class="form-control" >
				</div>
				</div>
				<div class="col-md-6">
				
				<div class="form-group">
					<label>Member ID:</label>
					<input type="Text" onkeypress="return onlyNumberKey(event)" name="memberId" class="form-control" >
				</div>
				</div>

				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>First Name:</label>
							<input type="Text" name="fName" class="form-control" >
						</div>
					</div>
					<div class="col-md-6">

						<div class="form-group">
							<label>Last Name:</label>
							<input type="Text" name="lName" class="form-control" >
						</div>
					</div>

				</div>
				<div class="row">
					<div class="col-md-6">
                        <div class="form-group">
                            <label>Package Type:</label>
                            <select class="form-control" onchange="getContractTypes()"
                                    id="packagetype" name="PackageType">
                                <option class="hidden" selected disabled>Select Package Type
                                </option>
                                <?php foreach ($gym->getPackages() as $package) { ?>
                                    <option value="<?php echo $package->getId(); ?>"><?php echo $package->getName(); ?></option>
                                <?php } ?>
                            </select>
                        </div>

					</div>
					<div class="col-md-6">
                        <div class="form-group">
                            <label>Contract Type:</label>
                            <select class="form-control" name="contracttype" id="contracttypes"
                                    onload="enabling_Contract_Types()"
                                    disabled>
                                <option class="hidden" selected disabled>Select Contract Type
                                </option>
                            </select>
                        </div>

					</div>

				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Membership Expires From:</label>
							<input type="date" onfocusout="validate_expireFromContractReport()" name="expiresFrom" id="expiresFrom" class="form-control" >
                            <span class="message" id="expiresFrom_message"></span>

                        </div>
					</div>
					<div class="col-md-6">

						<div class="form-group">
							<label>Membership Expires To:</label>
							<input type="date" onfocusout="validate_expireToContractReport()" name="expiresTo" id="expiresTo" class="form-control" >
                            <span class="message" id="expiresTo_message"></span>

                        </div>
					</div>

				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Contract Added Date From:</label>
							<input type="date" name="addedFrom" class="form-control" >
						</div>
					</div>
					<div class="col-md-6">

						<div class="form-group">
							<label>Contract Added Date To:</label>
							<input type="date" name="addedTo" class="form-control" >
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

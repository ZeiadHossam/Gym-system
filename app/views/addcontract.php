<div class="modal fade" id="contractModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add contract</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">

                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">


                                <form role="form" action="/GYM/contract/addContract" enctype="multipart/form-data" method="post">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="todaydate">Today Date</label>
                                                    <input type="text" name="todayDate"
                                                           value="<?php echo date("Y/m/d"); ?>" class="form-control"
                                                           readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>*Package Type </label>
                                                    <select class="form-control" onchange="getContractTypes()"
                                                            id="packagetype" name="PackageType">
                                                        <option class="hidden" selected disabled>Select Package Type
                                                        </option>
                                                        <?php foreach ($gym->getPackages() as $package) { ?>
                                                            <option value="<?php echo $package->getId(); ?>"><?php echo $package->getName(); ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>*Contract Type </label>
                                                    <select class="form-control" name="contracttype" id="contracttypes"
                                                            disabled>
                                                        <option class="hidden" selected disabled>Select Contract Type
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>*Freeze Days </label>
                                                   <input type="text" class="form-control" name="freezedays" >
                                                </div>

                                                <div class="form-group">
                                                    <label for="member">*Member </label>
                                                    <select class="form-control" id="member" name="member">
                                                        <option class="hidden" selected disabled>Select Member</option>
                                                        <?php foreach ($gym->getBranchs() as $branch) {
                                                            foreach ($branch->getMembers() as $member) {
                                                                ?>
                                                                <option value="<?php echo $branch->getId()."|".$member->getId(); ?>"><?php echo $member->getFirstName() . " " . $member->getLastName(); ?></option>
                                                            <?php }
                                                        } ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="membershipstarts">*Membership Starts</label>
                                                    <input type="date" class="form-control" name="MemberShipStart"
                                                           >
                                                </div>
                                                <div class="form-group">
                                                    <label>*Membership Ends</label>
                                                    <input type="date" name="MemberShipEnd" class="form-control"
                                                           >
                                                </div>
                                                <div class="form-group">
                                                    <label>*Contract Fees</label>
                                                    <input type="text" name="ContractFees" class="form-control numbers"
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <label>*Discount </label>
                                                    <select class="form-control" name="Discount">
                                                        <option class="hidden" selected>0%</option>
                                                        <?php for ($i = 5; $i <= 100; $i += 5) { ?>
                                                            <option value="<?php echo $i; ?>"><?php echo $i; ?>%</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>*Total Amount</label>
                                                    <input type="text" name="totalAmount" class="form-control numbers"
                                                           >
                                                </div>
                                                <div class="form-group">
                                                    <label>*Amount Paid</label>
                                                    <input type="text" name="AmountPaid" class="form-control numbers"
                                                           required>
                                                </div>
                                                <div class="form-group">
                                                    <label>*Amount Due</label>
                                                    <input type="text" name="AmountDue" class="form-control numbers">
                                                </div>

                                                <div class="form-group">
                                                    <label>*Amount Due Date</label>
                                                    <input type="date" name="AmountDueDate" class="form-control"
                                                           required>
                                                </div>
                                                <div class="form-group">
                                                    <label>*Payment Method </label>
                                                    <select class="form-control" name="PaymentMethod">
                                                        <option class="hidden" selected disabled>Select Payment Method
                                                        </option>


                                                        <?php foreach ($gym->getPaymentMethods() as $paymentmethod) { ?>

                                                            <option value="<?php echo $paymentmethod->getId();?>"> <?php echo $paymentmethod->getName(); ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>*Sales </label>
                                                    <select class="form-control"  name="Sales">
                                                    <?php if ($_SESSION['branch'] == NULL){
                                                    ?>

                                                        <option class="hidden"  selected disabled>Select Sales</option>

                                                        <?php foreach ($gym->getBranchs() as $branch) {
                                                            foreach ($branch->getEmployees() as $employee) {
                                                                ?>
                                                                <option value="<?php echo $employee->getId()."|".$employee->getFirstName()." ".$employee->getLastName();?>"> <?php echo $employee->getFirstName()." ".$employee->getLastName(); ?></option>
                                                            <?php }}} else {?>

                                                        <?php foreach ($gym->getBranchs()[$_SESSION['branch']]->getEmployees() as $employee) { ?>
                                                            <option value="<?php echo $employee->getId()?>"> <?php echo $employee->getFirstName()." ".$employee->getLastName(); ?></option>
                                                        <?php } } ?>
                                                    </select>
                                                </div>
                                                <b> Notes </b>
                                                <div class="form-group">
					<textarea rows="6" cols="60" name="Notes">
					</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="AddContract" class="btn btn-block btn-primary">Add
                                        contract
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-block btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>

</div>
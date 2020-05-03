<?php
$member=$gym->getBranchs()[$data['branchId']]->getMembers()[$data["memberId"]];
$contract=$member->getContracts()[$data["contractId"]];
?>
                <div class="container-fluid">
                    <div class="row">

                        <!-- left column -->
                        <div class="col-md-10 offset-md-1">
                            <!-- general form elements -->


                                <form role="form" action="addcontract.php" enctype="multipart/form-data" method="post">
                                    <div class="row view_emp">
                                        <div class="col-md-1">
                                            <a href="javascript:history.go(-1)" class="btn btn-md btn-default"><span
                                                        class="fa fa-angle-left"></span></a>

                                        </div>
                                        <div class="col-md-4 offset-3">

                                            <legend class="viewHeader">Edit Contract</legend>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="id">ID</label>
                                                <input type="text"  class="form-control" value="<?php echo $contract->getId(); ?>"
                                                       disabled>
                                            </div>
                                            <div class="form-group">
                                                <label>Package Type </label>

                                                <select class="form-control" onchange="getContractTypes()" id="packagetype" onfocusout="validate_PackageType()"
                                                        name="PackageType">
                                                    <option class="hidden"  disabled>Select Package Type
                                                    </option>
                                                    <?php foreach ($gym->getPackages() as $package){ ?>
                                                    <option <?php if($package->getId()==$contract->getPackage()->getId()) {?>selected<?php }?> value="<?php echo $package->getId(); ?>" ><?php echo $contract ->getPackage()->getName();?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Contract Type </label>

                                                <select class="form-control" name="contracttype" id="contracttypes" onfocusout="validate_ContractType()"
                                                        onload="enabling_Contract_Types()">
                                                    <option class="hidden"  disabled>Select Contract Type
                                                    </option>
                                                    <?php foreach ($gym->getPackages() as $package){
                                                        if($package->getId()==$contract->getPackage()->getId())
                                                        {foreach ($package->getPeriod() as $period){?>

                                                    <option <?php if($period->getId()==$contract->getPackage()->getPeriod()->getId()) {?>selected<?php }?> value="<?php echo $period->getId(); ?>" ><?php echo $period->getPeriod()." ".$package->getPeriodType();?></option>
                                                    <?php }} } ?>

                                                </select>
                                                <span class="message" id="contracttypes_message"></span>

                                            </div>
                                            <div class="form-group">
                                                <label for="freezeDays">Freeze Days</label>
                                                <input type="text" class="form-control" value="<?php echo $contract->getRemainfreezedays(); ?>"
                                                       id="freezeDays"
                                                       onfocusout="validate_FreezeDays()" name="freezedays"
                                                       onkeypress="return onlyNumberKey(event)">
                                                <span class="message" id="freezeDays_message"></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="memName">Member Name</label>
                                                <input type="text" id="member" name="member" class="form-control" value="<?php echo $member->getFirstName()." ".$member->getLastName(); ?>"
                                                      disabled >
                                            </div>

                                            <div class="form-group">
                                                <label for="startdate">Membership Start Date</label>
                                                <input type="date" class="form-control" value="<?php echo $contract->getStartdate(); ?>" id="startdate"
                                                       onfocusout="validate_startdate()" name="MemberShipStart"
                                                >
                                                <span class="message" id="startdate_message"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Membership End Date</label>
                                                <input type="date" class="form-control" value="<?php echo $contract->getEnddate(); ?>" name="MemberShipEnd" id="enddate"
                                                       onfocusout="validate_enddate()" class="form-control"
                                                >
                                                <span class="message" id="enddate_message"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Contract Fees</label>
                                                <input type="text" value="<?php echo $contract->getPaymentFees(); ?>" id="fees" name="ContractFees"
                                                       onfocusout="calcAmountDue(); calcTotalAmount(); validate_ContractsFees()" class="form-control numbers"
                                                       onkeypress="return onlyNumberKey(event)"
                                                >
                                                <span class="message" id="fees_message"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Discount</label>

                                                <select class="form-control" id="discount"
                                                        onchange="calcTotalAmount(); calcAmountDue()" name="Discount">
                                                    <?php for ($i = 5; $i <= 100; $i += 5) { ?>
                                                        <option value="<?php echo $i; ?>" <?php if ($i==$contract->getPaymentDiscount()){?> selected <?php }?>><?php echo $i; ?>%
                                                        </option>
                                                    <?php } ?>

                                                </select>
                                            </div>


                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Total Amount</label>
                                                <input type="text" class="form-control" value="<?php echo $contract->getTotalAmount(); ?>" disabled id="totalAmount"
                                                       onkeypress="return onlyNumberKey(event)">
                                            </div>
                                            <div class="form-group">
                                                <label>Amount Paid</label>
                                                <input type="text" class="form-control" value="<?php echo $contract->getAmountPaid(); ?>" name="AmountPaid" id="amountPaid"
                                                       onfocusout="calcAmountDue(); validate_AmountPaid()"
                                                       onkeypress="return onlyNumberKey(event)"
                                                >
                                                <span class="message" id="amountPaid_message"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Amount Due</label>
                                                <input type="text" class="form-control" value="<?php echo $contract->getAmountDue(); ?>" name="AmountDue" id="amountDue"
                                                       onkeypress="return onlyNumberKey(event)" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label>Amount Due Date</label>
                                                <input type="text" class="form-control" id="amountDueDate" onfocusout="validate_DueDate()" name="AmountDueDate" value="<?php echo $contract->getAmountDateDue(); ?>" >
                                            </div>
                                            <span class="message" id="amountDueDate_message"></span>

                                            <div class="form-group">
                                                <label>Payment Method </label>
                                                <select class="form-control" id="paymentMethod" name="PaymentMethod">
                                                    <?php foreach ($gym->getPaymentMethods() as $paymentmethod) { ?>

                                                        <option value="<?php echo $paymentmethod->getId(); ?>" <?php if ($paymentmethod->getId()==$contract->getPaymentMethod()->getId()) {?> selected <?php }?>> <?php echo $paymentmethod->getName(); ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Sales</label>
                                                <select class="form-control" disabled id="sales"  name="Sales">

                                                    <option selected disabled><?php echo $contract->getSales();?></option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Remaining <?php echo $contract->getPackage()->getPeriodType();?></label>
                                                <input type="text" class="form-control" value="<?php echo $contract->getRemaningPackagePeriod(); ?>" disabled>
                                            </div>
                                            <b> notes </b>
                                            <br>
                                            <div class="form-group">

					<textarea rows="6" cols="60"  name="Notes"><?php echo $contract->getNote();?>
					</textarea>
                                            </div>


                                        </div>
                                    </div>

					<button type="submit" name="editContract" class="btn btn-primary Addmemberbutton viewmemberContractsbutton">Submit</button>
                                </form>
                        </div>
                    </div>
                </div>
        

<?php
$member = $gym->getBranchs()[$data['branchId']]->getMembers()[$data["memberId"]];
$contract = $member->getContracts()[$data["contractId"]];
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

                        <legend class="viewHeader">View Contract Information</legend>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" class="form-control" value="<?php echo $contract->getId(); ?>"
                                   readonly>
                        </div>
                        <div class="form-group">
                            <label>Package Type </label>

                            <select class="form-control" disabled>

                                <option selected><?php echo $contract->getPackage()->getName(); ?></option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Contract Type </label>

                            <select class="form-control" disabled>

                                <option selected><?php echo $contract->getPackage()->getPeriod()->getPeriod() . " " . $contract->getPackage()->getPeriodType(); ?></option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="freezeDays">Freeze Days</label>
                            <input type="text" class="form-control"
                                   value="<?php echo $contract->getRemainfreezedays(); ?>"
                                   readonly>
                        </div>

                        <div class="form-group">
                            <label for="memName">Member Name</label>
                            <input type="text" class="form-control"
                                   value="<?php echo $member->getFirstName() . " " . $member->getLastName(); ?>"
                                   readonly>
                        </div>

                        <div class="form-group">
                            <label for="startdate">Membership Start Date</label>
                            <input type="text" class="form-control" value="<?php echo $contract->getStartdate(); ?>"
                                   readonly>
                        </div>
                        <div class="form-group">
                            <label>Membership End Date</label>
                            <input type="text" class="form-control" value="<?php echo $contract->getEnddate(); ?>"
                                   readonly>
                        </div>
                        <div class="form-group">
                            <label>Contract Fees</label>
                            <input type="text" class="form-control" value="<?php echo $contract->getPaymentFees(); ?>"
                                   readonly>
                        </div>
                        <div class="form-group">
                            <label>Discount</label>

                            <select class="form-control" disabled>

                                <option selected><?php echo $contract->getPaymentDiscount() . "%"; ?></option>

                            </select>
                        </div>


                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Total Amount</label>
                            <input type="text" class="form-control" value="<?php echo $contract->getTotalAmount(); ?>"
                                   readonly>
                        </div>
                        <div class="form-group">
                            <label>Amount Paid</label>
                            <input type="text" class="form-control" value="<?php echo $contract->getAmountPaid(); ?>"
                                   readonly>
                        </div>
                        <div class="form-group">
                            <label>Amount Due</label>
                            <input type="text" class="form-control" value="<?php echo $contract->getAmountDue(); ?>"
                                   readonly>
                        </div>
                        <div class="form-group">
                            <label>Amount Due Date</label>
                            <input type="text" class="form-control" value="<?php echo $contract->getAmountDateDue(); ?>"
                                   readonly>
                        </div>

                        <div class="form-group">
                            <label>Payment Method </label>
                            <select class="form-control" disabled>

                                <option selected><?php echo $contract->getPaymentMethod()->getName(); ?></option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sales</label>
                            <select class="form-control" disabled>

                                <option selected><?php echo $contract->getSales(); ?></option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Remaining <?php echo $contract->getPackage()->getPeriodType(); ?></label>
                            <input type="text" class="form-control"
                                   value="<?php echo $contract->getRemaningPackagePeriod(); ?>" readonly>
                        </div>
                        <b> notes </b>
                        <br>
                        <div class="form-group">

					<textarea rows="6" cols="60" readonly><?php echo $contract->getNote(); ?>
					</textarea>
                        </div>


                    </div>
                </div>

            </form>
            <a href="/GYM/member/viewFreezeDays/<?php echo $data['branchId'] . "/" . $data['memberId'] ."/".$data["contractId"] ;?>"
               class="btn btn-info viewmemberContractsbutton">View Freeze Days</a>

            <a href="/GYM/member/viewMember/<?php echo $data['branchId'] . "/" . $data['memberId'] ?>"
               class="btn btn-info viewmemberContractsbutton">View Member</a>
        </div>
    </div>
</div>
</div>


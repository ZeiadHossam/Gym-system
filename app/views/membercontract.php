<?php
$member = $gym->getBranchs()[$data['branchId']]->getMembers()[$data['memberId']];
$branch = $gym->getBranchs()[$data['branchId']];
?>
<div class="container-fluid ">

    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="row view_emp">
                <div class="col-md-1">
                    <a href="javascript:history.go(-1)" class="btn btn-md btn-default"><span
                                class="fa fa-angle-left"></span></a>

                </div>
                <div class="col-md-4 offset-3">

                    <legend class="viewHeader"><?php echo $member->getFirstName()." ".$member->getLastName(); ?> Contracts</legend>
                </div>
            </div>
            <table id="custTable" class="addmembertable table table-bordered table-striped">
                <thead>
                <tr>

                    <th>Package</th>
                    <th>Strat Date</th>
                    <th>End Date</th>
                    <th>Member Id</th>
                    <th>Remaining Period</th>
                    <th>Fees</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($member->getContracts() as $contract) { ?>
                <tr>
                    <td><?php echo $contract->getPackage()->getName(); ?> </td>
                    <td><?php echo $contract->getStartDate(); ?></td>
                    <td><?php echo $contract->getEndDate(); ?></td>
                    <td><?php echo $member->getId(); ?></td>
                    <td><?php echo $contract->getRemaningPackagePeriod()." ".$contract->getPackage()->getPeriodType(); ?></td>
                    <td><?php echo $contract->getPaymentFees(); ?></td>


                    <td>
                        <div class="btn-group tablebuttons">
                            <a href="/GYM/contract/viewContract/<?php echo $branch->getId(); ?>/<?php echo $member->getId(); ?>/<?php echo $contract->getId(); ?>"
                               class="btn btn-secondary btn-sm">View</a>
                        </div>
                    </td>
                    <?php } ?>

                </tr>

                </tbody>
            </table>

        </div>
    </div>
</div>

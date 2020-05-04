<?php
$member = $gym->getBranchs()[$data['branchId']]->getMembers()[$data['memberId']];
$branch= $gym->getBranchs()[$data['branchId']];
?>
<div class="row">
    <table id="custTable" class="addmembertable table table-bordered table-striped">
        <thead>
        <tr>

            <th>Package</th>
            <th>Enddate</th>
            <th>Issuedate</th>
            <th>MemberId</th>
            <th>Remaning Period</th>
            <th>Fees</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($member->getContracts() as $contract) { ?>
        <tr>
            <td><?php echo $contract->getPackage()->getName(); ?> </td>
            <td><?php echo $contract->getEndDate(); ?></td>
            <td><?php echo $contract->getIssueDate(); ?></td>
            <td><?php echo $member->getId(); ?></td>
            <td><?php echo $contract->getRemaningPackagePeriod(); ?></td>
            <td><?php echo $contract->getPaymentFees(); ?></td>


            <td>
                <div class="btn-group tablebuttons">
                    <a href="/GYM/contract/viewContract/<?php echo $branch->getId(); ?>/<?php echo $member->getId();?>/<?php echo $contract->getId() ;?>"  class="btn btn-secondary btn-sm">View</a>
                </div>
            </td>
            <?php } ?>

        </tr>

        </tbody>
    </table>


</div>
<a href="javascript:history.go(-1)" class="btn btn-block btn-sm btn-default">Close</a>
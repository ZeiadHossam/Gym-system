
<section class="content">
    <div class="container-fluid">
        <br>
        <legend>Reception</legend>

        <div class="row receptionimage">
        </div>
        <br>
        <div class="row">
            <table id="custTable" class="addmembertable table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Member ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Package</th>
                    <th>Type</th>
                    <th>Remaining Period</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($gym->getBranchs() as $branch) {
                    foreach ($branch->getMembers() as $member) {
                        foreach ($member->getContracts() as $contract) {
                            ?>
                            <tr>
                                <td><?php echo $member->getId(); ?></td>
                                <td><?php echo $member->getFirstName(); ?></td>
                                <td><?php echo $member->getLastName(); ?></td>
                                <td><?php echo $contract->getPackage()->getName(); ?></td>
                                <td><?php echo $contract->getPackage()->getPeriod()->getPeriod() . " " . $contract->getPackage()->getPeriodType(); ?></td>
                                <td><?php echo $contract->getRemaningPackagePeriod()." ".$contract->getPackage()->getPeriodType(); ?></td>
                                <td><?php if ($contract->getStatus() == 1) {
                                        echo "Not Started";
                                    } elseif ($contract->getStatus() == 2) {
                                        echo "Active";
                                    } elseif ($contract->getStatus() == 3) {
                                        echo "Freezed";
                                    } elseif  ($contract->getStatus() == 4)  {
                                        echo "Expired";
                                    }?>
                                </td>
                                <td>
                                    <div class="btn-group tablebuttons">

                                    <?php   if ($contract ->getStatus()==2 && $contract ->getRemaningPackagePeriod()>0){?>
                                        <a type="button" href="/GYM/reception/checkSignIn/<?php echo $branch->getId() . "/" . $member->getId() . "/" . $contract->getId(); ?>"
                                                class="btn btn-success btn-sm ">Sign-in
                                        </a>
                                <?php } ?>

                                        <a href="/GYM/contract/viewContract/<?php echo $branch->getId() . "/" . $member->getId() . "/" . $contract->getId(); ?>"
                                           class="btn btn-secondary btn-sm">View</a>
                                    </div>
                                </td>
                            </tr>
                        <?php }}} ?>

                </tbody>
            </table>

        </div>
    </div>
</section>

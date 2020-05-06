<?php
$member = $gym->getBranchs()[$data['branchId']]->getMembers()[$data['memberId']];

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

                        <legend class="viewHeader"> Member Attendance</legend>
                    </div>
                </div>
                <table id="custTable" class="addmembertable table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ContractId</th>
                        <th>PackageType</th>
                        <th>Status</th>
                        <th>Attend On</th>
                        <th>Attend At</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($member->getContracts() as $contract) { ?>
                    <?php foreach ($member->getAttendance()[$contract->getId()] as $attendence) { ?>
                    <tr>
                        <td><?php echo $contract->getId();?> </td>
                        <td><?php echo $contract->getPackage()->getName();?> </td>
                        <td><?php if ($contract->getStatus() == 1) {
                                echo "Not Started";
                            } elseif ($contract->getStatus() == 2) {
                                echo "Active";
                            } elseif ($contract->getStatus() == 3) {
                                echo "Freezed";
                            } elseif  ($contract->getStatus() == 4)  {
                                echo "Expired";
                            }?> </td>
                        <td><?php echo date("Y-m-d",strtotime($attendence)); ?></td>
                        <td><?php echo date("H:i:s",strtotime($attendence)); ?></td>

                        <?php }}?>

                    </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
<?php

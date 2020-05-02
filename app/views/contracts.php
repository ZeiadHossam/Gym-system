<?php include("addcontract.php") ?>
<?php include("delete.php")?>
    <section class="content">
        <div class="container-fluid">
            <br>
            <legend>Contracts</legend>
            <div class="row contractimage">
            </div>
            <div class="row">
                <button type="button" class="btn btn-info Addmemberbutton" data-toggle="modal" data-target="#contractModal"
                        data-backdrop="static" data-keyboard="false">
                    Add Contract
                </button>
            </div>
            <br>
            <div class="row">
                <table id="custTable" class="addmembertable table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Member ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Mobile Phone</th>
                        <th>Package</th>
                        <th>Type</th>
                        <th>Due</th>
                        <th>Status</th>
                        <th>Fees</th>
                        <th>Payment Method</th>
                    </tr>
                    </thead>
                    <tbody>
<?php foreach ($gym->getBranchs() as $branch) {
    foreach ($branch->getMembers() as $member) {
    foreach ($member->getContracts() as $contract) {
        ?>
                    <tr>
                        <td><?php echo $contract->getId();?></td>
                        <td><?php echo $member->getId();?></td>
                        <td><?php echo $member->getFirstName();?></td>
                        <td><?php echo $member->getLastName();?></td>
                        <td><?php echo $member->getMobilePhone();?></td>
                        <td><?php echo $contract ->getPackage()->getName();?></td>
                        <td><?php echo $contract ->getPackage()->getPeriod()->getPeriod()."-".$contract->getPackage()->getPeriodType();?></td>
                        <td><?php echo $contract ->getIssueDate();?></td>
                        <td><?php echo $contract ->getPaymentFees();?></td>
                        <td><?php echo $contract ->getPaymentMethod()->getName();?></td>
                        <td>
                            <div class="btn-group tablebuttons">
								<a href="viewcontract.php" class="btn btn-secondary btn-sm" >View</a>
								<a href="editcontract.php" class="btn btn-info btn-sm">Edit</a>
								<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete">
									Delete
								</button>
                            </div>
                        </td>
                    </tr>
                   <?php }}} ?>
                    </tbody>
                </table>

            </div>
        </div>
    </section>


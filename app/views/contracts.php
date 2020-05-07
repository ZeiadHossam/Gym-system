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
                        <th>End Date</th>
                            <th>Status</th>
                        <th>Payment Method</th>
                        <th>Actions</th>

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
                        <td><?php echo $contract ->getEndDate();?></td>
                        <td><?php if ($contract->getStatus() == 1) {
                                echo "Not Started";
                            } elseif ($contract->getStatus() == 2) {
                                echo "Active";
                            } elseif ($contract->getStatus() == 3) {
                                echo "Freezed";
                            } elseif  ($contract->getStatus() == 4)  {
                                echo "Expired";
                            }?></td>
                        <td><?php echo $contract ->getPaymentMethod()->getName();?></td>
                        <td>
                            <div class="btn-group tablebuttons">
								<a href="/GYM/contract/viewContract/<?php echo $branch->getId()."/".$member->getId()."/".$contract->getId(); ?>" class="btn btn-secondary btn-sm" >View</a>
								<a href="/GYM/contract/viewEditContract/<?php echo $branch->getId()."/".$member->getId()."/".$contract->getId(); ?>" class="btn btn-info btn-sm">Edit</a>
								<button type="button" onclick="deletingContract(<?php echo $branch->getId().",".$member->getId().",".$contract->getId();?>)" class="btn btn-danger btn-sm" >
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


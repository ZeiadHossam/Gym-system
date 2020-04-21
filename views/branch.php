<?php include("../shared/main.php"); ?>
<section class="content">

    <div class="container-fluid">
        <br>

        <form role="form" action="../Controller/branch_controller.php" method="get">

            <div class="card-body">
                <div class="form-group row">
                    <label for="Bransh Name" class="col-sm-2 col-form-label">Branch Name:</label>
                    <div class="col-sm-10">
                        <?php if (isset($_GET['branchEditId'])) {
                            ?>
                            <input type="text" name="branchEditId"
                                   value="<?php echo $gym->getBranchs()[$_GET['branchEditId']]->getId() ?>" hidden>
                            <input type="Text" name="branchCity" class="form-control"
                                   value="<?php echo $gym->getBranchs()[$_GET['branchEditId']]->getCity() ?>" required>
                        <?php } else {
                            ?>
                            <input type="Text" name="branchCity" class="form-control" required>
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Branch Address" class="col-sm-2 col-form-label">Branch Address:</label>
                    <div class="col-sm-10">
                        <?php if (isset($_GET['branchEditId'])) {
                            ?>
                            <input type="Text" name="branchAddress" class="form-control"
                                   value="<?php echo $gym->getBranchs()[$_GET['branchEditId']]->getAddress(); ?>"
                                   required>
                        <?php } else {
                            ?>
                            <input type="Text" name="branchAddress" class="form-control" required>
                        <?php } ?>

                    </div>
                </div>
                <div class="btn-group tablebuttons">
                    <button type="submit" name="addbranch" class="btn btn-success btn-flat ">Confirm</button>
                    <button type="reset" <?php if (isset($_GET['branchEditId'])) { ?>  onclick="cancellingBranch()"  <?php } ?>
                            class="btn btn-danger btn-flat ">Clear Fields
                    </button>

                </div>
        </form>
        <br>
        <br>
        <div class="row">
            <table id="custTable" class="addmembertable table table-bordered table-striped">
                <thead>
                <tr>
                    <th>id</th>
                    <th>City</th>
                    <th>Address</th>

                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($gym->getBranchs() as $branch) {
                    ?>
                    <tr>
                        <td><?php echo $branch->getId(); ?></td>
                        <td><?php echo $branch->getCity(); ?></td>
                        <td><?php echo $branch->getAddress(); ?></td>

                        <td>
                            <div class="btn-group tablebuttons">
                                <button type="button" onclick="editingBranch(<?php echo $branch->getId(); ?>)"
                                        class="btn btn-info">Edit
                                </button>

                                <button type="button" onclick="deletingBranch(<?php echo $branch->getId(); ?>)"
                                        class="btn btn-danger btn-sm ">Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

        </div>
    </div>


    </div>
</section>
<?php include("../shared/footer.php"); ?>

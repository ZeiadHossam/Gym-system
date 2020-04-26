<?php include("../shared/main.php"); ?>
<section class="content">

    <div class="container-fluid">
        <br>
        <legend>Departments</legend>

        <form role="form" action="../Controller/usertype_controller.php" onsubmit="return validate_depData()"
              method="get">
            <div class="card-body">
                <div class="form-group row">
                    <label for="Department Name" class="col-sm-2 col-form-label">Department Name:</label>
                    <div class="col-sm-10">
                        <?php if (isset($_GET['depEditId'])) {
                            $gympages = $gym->getUserTypes()[$_GET['depEditId']]->getPages();
                            ?>
                            <input type="text" name="depEditId"
                                   value="<?php echo $gym->getUserTypes()[$_GET['depEditId']]->getId() ?>" hidden>
                            <input type="Text" id="depName" name="depName" class="form-control"
                                   value="<?php echo $gym->getUserTypes()[$_GET['depEditId']]->getName() ?>"  <?php if ($gym->getUserTypes()[$_GET['depEditId']]->getName() == 'Owner') {?>disabled <?php }?> >
                            <?php } else { ?>
                            <input type="Text" id="depName" name="depName" class="form-control">
                        <?php } ?>
                        <span class="message"  id="depName_message"></span>

                    </div>
                </div>
                <div class="form-group row">

                    <label for="Privileges" class="col-sm-2 col-form-label">Privileges:</label>
                    <div class="col-sm-2 offset-sm-1">

                        <input class="form-check-input"
                               name="receptionCheck" <?php if (isset($_GET['depEditId']) && $gympages[1]->get_access() == 1) { ?> checked <?php } ?>
                               type="checkbox">Reciption
                        <br>
                        <input class="form-check-input"
                               name="notificationCheck" <?php if (isset($_GET['depEditId']) && $gympages[2]->get_access() == 1) { ?> checked <?php } ?>
                               type="checkbox">Notifications
                        <br>
                        <input class="form-check-input"
                               name="membersCheck" <?php if (isset($_GET['depEditId']) && $gympages[3]->get_access() == 1) { ?> checked <?php } ?>
                               type="checkbox">Members
                        <br>
                        <input class="form-check-input"
                               name="employeesCheck" <?php if (isset($_GET['depEditId']) && $gympages[4]->get_access() == 1) { ?> checked <?php } ?>
                               type="checkbox">Emloyees

                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input"
                               name="contractsCheck" <?php if (isset($_GET['depEditId']) && $gympages[5]->get_access() == 1) { ?> checked <?php } ?>
                               type="checkbox">Contracts
                        <br>
                        <input class="form-check-input"
                               name="adminCheck" <?php if (isset($_GET['depEditId']) && $gympages[6]->get_access() == 1) { ?> checked <?php } ?>
                               type="checkbox">Administration
                        <br>
                        <input class="form-check-input"
                               name="reportsCheck" <?php if (isset($_GET['depEditId']) && $gympages[7]->get_access() == 1) { ?> checked <?php } ?>
                               type="checkbox">Reports
                    </div>
                    <span class="message" id="depboxes_message"></span>

                </div>
            </div>
            <div class="btn-group tablebuttons">
                <button type="submit" name="addDepartment" class="btn btn-success btn-flat ">Confirm</button>
                <button type="reset"
                        class="btn btn-danger btn-flat " <?php if (isset($_GET['depEditId'])) { ?>  onclick="cancellingDepartment()"  <?php } ?>>
                    Clear Fields
                </button>

            </div>
        </form>
        <br>
        <div class="row">
            <table id="custTable" class="addmembertable table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Type</th>

                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($gym->getUserTypes() as $department) {
                    ?>
                    <tr>
                        <td><?php echo $department->getName(); ?></td>

                        <td>
                            <div class="btn-group tablebuttons">
                                <button type="button" onclick="editingDepartment(<?php echo $department->getId() ?>)"
                                        class="btn btn-info">Edit

                                </button>


                                <button type="button" onclick="deletingDepartment(<?php echo $department->getId() ?>)"
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



<?php include("../shared/main.php"); ?>
<section class="content">

    <div class="container-fluid">
        <br>
        <legend>Packages</legend>

        <form role="form" action="../controller/package_controller.php" method="get">
            <div class="card-body">
                <div class="form-group row">
                    <label for="Package Name"  class="col-sm-2 col-form-label">Package Name:</label>
                    <div class="col-sm-10">
                        <?php if(isset($_GET['packageEditId'])){
                        $packageperiods=$gym->getPackages()[$_GET['packageEditId']]->getPeriod();
                        ?>
                        <input type="text" name="packageEditId"
                               value="<?php echo $gym->getPackages()[$_GET['packageEditId']]->getId()  ?>" hidden>
                        <input type="Text" name="packageName" value="<?php echo $gym->getPackages()[$_GET['packageEditId']]->getName() ?>" class="form-control">
                        <?php } else {?>
                            <input type="Text" name="packageName" class="form-control">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Type"  class="col-sm-2 col-form-label">Type:</label>
                    <div class="col-sm-10">
                        <select name="periodType" class="form-control">
                            <option class="hidden" selected disabled>Select Type</option>
                            <option <?php if (isset($_GET['packageEditId'])&& $gym->getPackages()[$_GET['packageEditId']]->getPeriodType()=="Sessions"){ ?> selected <?php }?>>Sessions</option>
                            <option <?php if (isset($_GET['packageEditId'])&& $gym->getPackages()[$_GET['packageEditId']]->getPeriodType()=="Days"){ ?> selected <?php }?>>Days</option>
                            <option <?php if (isset($_GET['packageEditId'])&& $gym->getPackages()[$_GET['packageEditId']]->getPeriodType()=="Months"){ ?> selected <?php }?>>Months</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Contract Types" class="col-sm-2 col-form-label">Contract Types:</label>
                    <div class="col-sm-10">
                        <select class="js-example-basic-multiple form-control" name="contractTypes[]" multiple="multiple">
                            <?php foreach ($packageperiods as $period){?>
                            <option selected><?php echo $period->getPeriod()?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="btn-group tablebuttons">
                    <button type="submit" name="addPackage" class="btn btn-success btn-flat ">Confirm</button>
                    <button type="reset" class="btn btn-danger btn-flat " <?php if (isset($_GET['packageEditId'])) { ?>  onclick="cancellingPackage()"  <?php } ?> >Clear Fields</button>

                </div>
        </form>
        <br>
        <br>
        <div class="row">
            <table id="custTable" class="addmembertable table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Period</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($gym->getPackages() as $package) {  ?>
                    <tr>
                        <td><?php echo $package->getId(); ?></td>
                        <td><?php echo $package->getName(); ?></td>
                        <td>
                        <?php foreach ($package->getPeriod() as $period) {  ?>
                        <?php echo $period->getPeriod(); ?>
                        <?php echo $package->getPeriodType()."  &nbsp &nbsp &nbsp &nbsp &nbsp";; ?>
                        <?php } ?>
                        </td>
                        <td>
                            <div class="btn-group tablebuttons">
                                <button type="button" onclick="editingPackage(<?php echo $package->getId()?>)" class="btn btn-info btn-sm">Edit</button>

                                <button type="button" onclick="deletingPackage(<?php echo $package->getId()?>)" class="btn btn-danger btn-sm ">Delete</button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>


    </div>
</section>
<?php include("../shared/footer.php"); ?>

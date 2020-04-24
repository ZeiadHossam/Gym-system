<?php include("../shared/main.php"); ?>
<section class="content">

    <div class="container-fluid">
        <br>
        <legend>Packages</legend>

        <form role="form" action="#" method="post">
            <div class="card-body">
                <div class="form-group row">
                    <label for="Package Name" class="col-sm-2 col-form-label">Package Name:</label>
                    <div class="col-sm-10">
                        <input type="Text" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Type" class="col-sm-2 col-form-label">Type:</label>
                    <div class="col-sm-10">
                        <select class="form-control">
                            <option class="hidden" selected disabled>Select Type</option>
                            <option>session</option>
                            <option>duration</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Contract Types" class="col-sm-2 col-form-label">Contract Types:</label>
                    <div class="col-sm-10">
                        <input type="Text" class="form-control" multiple>
                        <!--lesa m5lstsh-->


                    </div>
                </div>
                <div class="btn-group tablebuttons">
                    <button type="submit" class="btn btn-success btn-flat ">Confirm</button>
                    <button type="reset" class="btn btn-danger btn-flat ">Clear Fields</button>

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
                        <td><?php echo $package->getPeriod(); ?>
                        <?php echo $package->getPeriodType(); ?></td>
                        <td>
                            <div class="btn-group tablebuttons">
                                <button type="button" class="btn btn-info btn-sm">Edit</button>

                                <button type="button" class="btn btn-danger btn-sm ">Delete</button>
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

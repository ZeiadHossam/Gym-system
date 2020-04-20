<?php include("../shared/main.php"); ?>

<section class="content">

    <div class="container-fluid">
        <br>
        <form role="form" action="Controller/controllingpayment.php" method="get">
            <div class="card-body">
                <div class="form-group row">
                    <label for="Method" class="col-sm-2 col-form-label">Method:</label>
                    <div class="col-sm-10">
                        <input type="text" name="payname" class="form-control">
                    </div>
                </div>

                <div class="btn-group tablebuttons">
                    <button type="submit" name="add" class="btn btn-success btn-flat ">Confirm</button>
                    <button type="reset" class="btn btn-danger btn-flat ">Clear Fields</button>

                </div>

            </div>
        </form>
    </div>
    <br>
    <div class="row">
        <table id="custTable" class="addmembertable table table-bordered table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Method</th>
                <th>Actions</th>

            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($gym->getPaymentMethods() as $paymentMethod) {
            ?>
            <tr>
                <td><?php echo $paymentMethod->getId();?></td>
                <td><?php echo $paymentMethod->getName();?></td>

                <td>
                    <div class="btn-group tablebuttons">
                        <button type="button" class="btn btn-info">Edit

                        </button>

                        <button type="button" class="btn btn-danger btn-sm ">Delete</button>
                    </div>
                </td>
            </tr>
<?php }?>
            </tbody>
        </table>

    </div>

    </div>
</section>
<?php include("../shared/footer.php") ?>

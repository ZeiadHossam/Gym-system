<?php include("../shared/main.php"); ?>

<section class="content">

    <div class="container-fluid">
        <br>
        <legend>Payment Method</legend>

        <form role="form" action="../Controller/payment_controller.php"" method="get">
            <div class="card-body">
                <div class="form-group row">
                    <label for="Method" class="col-sm-2 col-form-label">Method:</label>
                    <div class="col-sm-10">

                        <input type="text" name="payname" class="form-control">
                    </div>
                </div>

                <div class="btn-group tablebuttons">
                    <button type="submit" name="addpayment" class="btn btn-success btn-flat ">Confirm</button>
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
                        <button type="button"  onclick="editingPayment(<?php echo $paymentMethod->getId(); ?>)"class="btn btn-info">Edit

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
if (isset($_SESSION['messege'])) {
echo "<script> showToasting('" . $_SESSION['messege'] . "',2);</script>";
unset($_SESSION['messege']);
} elseif (isset($_SESSION['errormessege'])) {
echo "<script> showToasting('" . $_SESSION['errormessege'] . "',1);</script>";
unset($_SESSION['errormessege']);
}
?><?php
if (isset($_SESSION['messege'])) {
    echo "<script> showToasting('" . $_SESSION['messege'] . "',2);</script>";
    unset($_SESSION['messege']);
} elseif (isset($_SESSION['errormessege'])) {
    echo "<script> showToasting('" . $_SESSION['errormessege'] . "',1);</script>";
    unset($_SESSION['errormessege']);
}
?>

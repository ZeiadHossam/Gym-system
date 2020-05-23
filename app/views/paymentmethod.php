<?php include("delete.php") ?>

<section class="content">

    <div class="container-fluid">
        <br>
        <legend>Payment Method</legend>

        <form role="form" action="/GYM/paymentMethod/<?php if (!isset($data['paymentmethodId'])){ ?>addPaymentMethod <?php }else { ?>editPaymentMethod<?php } ?>" method="get" onsubmit="return validate_paymentMethod()">
            <div class="card-body">
                <div class="form-group row">
                    <label for="Method" class="col-sm-2 col-form-label">Method:</label>
                    <div class="col-sm-10">
                        <?php if(isset($data['paymentmethodId'])){?>
                            <input type="text" name="paymentEditId"
                                   value="<?php echo $gym->getPaymentMethods()[$data['paymentmethodId']]->getId()  ?>" hidden>
                            <select name="payname" onfocusout="validate_paymentMethod()" id="paymentMethod" class="form-control">
                                <option class="hidden" selected disabled>Select Payment Method</option>
                                <option <?php if (isset($data['paymentmethodId'])&& $gym->getPaymentMethods()[$data['paymentmethodId']]->getName()=="Cash"){ ?> selected <?php }?>>Cash</option>
                                <option <?php if (isset($data['paymentmethodId'])&& $gym->getPaymentMethods()[$data['paymentmethodId']]->getName()=="Visa"){ ?> selected <?php }?>>Visa</option>
                                <option <?php if (isset($data['paymentmethodId'])&& $gym->getPaymentMethods()[$data['paymentmethodId']]->getName()=="MasterCard"){ ?> selected <?php }?>>MasterCard</option>
                                <option <?php if (isset($data['paymentmethodId'])&& $gym->getPaymentMethods()[$data['paymentmethodId']]->getName()=="Fawry"){ ?> selected <?php }?>>Fawry</option>
                            </select>
                        <?php }
                        else
                            {?>
                                <select name="payname" onfocusout="validate_paymentMethod()" id="paymentMethod" class="form-control">
                                    <option class="hidden" selected disabled>Select Payment Method</option>
                                    <option >Cash</option>
                                    <option >Visa</option>
                                    <option >MasterCard</option>
                                    <option >Fawry</option>
                                </select>

                            <?php }?>
                        <span class="message" id="paymentMethod_message"></span>
                    </div>

                </div>

                <div class="btn-group tablebuttons">
                    <button type="submit" name="addpayment" class="btn btn-success btn-flat ">Confirm</button>
                    <button type="reset" <?php if (isset($data['paymentmethodId'])) { ?>  onclick="cancellingPayment()"  <?php } ?> class="btn btn-danger btn-flat ">Clear Fields</button>

                </div>

            </div>
        </form>
    </div>
    <br>
    <div class="row">
        <table id="custTable" class="addmembertable table table-bordered table-striped">
            <thead>
            <tr>
                <th>Method</th>
                <th>Actions</th>

            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($gym->getPaymentMethods() as $paymentMethod) {
            ?>
            <tr>
                <td><?php echo $paymentMethod->getName();?></td>

                <td>
                    <div class="btn-group tablebuttons">
                        <button type="button"  onclick="editingPayment(<?php echo $paymentMethod->getId(); ?>)"class="btn btn-info">Edit

                        </button>

                        <button type="button" onclick="deletingPayment(<?php echo $paymentMethod->getId(); ?>)" class="btn btn-danger btn-sm ">Delete</button>
                    </div>
                </td>
            </tr>
<?php }?>
            </tbody>
        </table>

    </div>

    </div>
</section>

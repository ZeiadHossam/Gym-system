<?php include("delete.php") ?>
<section class="content">

    <div class="container-fluid">
        <br>
        <legend>Branches</legend>
        <form role="form" action="/GYM/branch/<?php if (!isset($data['branchId'])){ ?>addBranch <?php }else { ?>editBranch<?php } ?>" method="get" onsubmit="return validate_branchData()">

            <div class="card-body">
                <div class="form-group row">
                    <label for="Bransh Name" class="col-sm-2 col-form-label">Branch Name(Area):</label>
                    <div class="col-sm-10">
                        <?php if (isset($data['branchId'])) {
                            ?>
                            <input type="text" name="branchEditId"
                                   value="<?php echo $gym->getBranchs()[$data['branchId']]->getId() ?>" hidden>
                            <input type="Text" id="branchCity" name="branchCity" onfocusout="validate_branchCity()" class="form-control"
                                       value="<?php echo $gym->getBranchs()[$data['branchId']]->getCity() ?>" >
                        <?php } else {
                            ?>
                            <input type="Text" id="branchCity" name="branchCity" class="form-control" onfocusout="validate_branchCity()" >
                        <?php } ?>
                        <span class="message" id="branchCity_message"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Branch Address" class="col-sm-2 col-form-label">Branch Address:</label>
                    <div class="col-sm-10">
                        <?php if (isset($data['branchId'])) {
                            ?>
                            <input type="Text" name="branchAddress" onfocusout="validate_branchAddress()" class="form-control" id="branchAddress"
                                   value="<?php echo $gym->getBranchs()[$data['branchId']]->getAddress(); ?>"
                                   >
                        <?php } else {
                            ?>
                            <input type="Text" id="branchAddress"  onfocusout="validate_branchAddress()" name="branchAddress" class="form-control" >
                        <?php } ?>
                        <span class="message" id="branchAddress_message"></span>

                    </div>
                </div>
                <div class="btn-group tablebuttons">
                    <button type="submit" name="addbranch" class="btn btn-success btn-flat ">Confirm</button>
                    <button type="reset" <?php if (isset($data['branchId'])) { ?>  onclick="cancellingBranch()"  <?php } ?>
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
                    <th>Name(Area)</th>
                    <th>Address</th>

                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($gym->getBranchs() as $branch) {
                    ?>
                    <tr>
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


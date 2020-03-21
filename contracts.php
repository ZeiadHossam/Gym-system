<?php include("shared/main.php") ?>
<?php include("addcontract.php") ?>
<?php include("viewcontract.php") ?>
<?php include("editcontract.php") ?>
    <section class="content">
        <div class="container-fluid">
            <br>
            <div class="row contractimage">
            </div>
            <div class="row">
                <button type="button" class="btn btn-info Addmemberbutton" data-toggle="modal" data-target="#modal-xll"
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
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1000</td>
                        <td>1</td>
                        <td>mahmoud</td>
                        <td>omar</td>
                        <td>01111111111</td>
                        <td>MemberShip</td>
                        <td>30 Days</td>
                        <td>200</td>
                        <td>
                            <div class="btn-group tablebuttons">
                                <button class="btn btn-info" data-backdrop="static" data-keyboard="false"
                                        data-toggle="modal" data-target="#viewcontract">View
                                </button>
                                <button class="btn btn-info" data-backdrop="static" data-keyboard="false"
                                        data-toggle="modal" data-target="#editcontract">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm ">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2000</td>
                        <td>2</td>
                        <td>amr</td>
                        <td>khaled</td>
                        <td>01222222222</td>
                        <td>Trainer</td>
                        <td>15 Session</td>
                        <td>150</td>
                        <td>
                            <div class="btn-group tablebuttons">
                                <button type="button" class="btn btn-secondary btn-sm ">View</button>
                                <button type="button" class="btn btn-info btn-sm ">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm ">Delete</button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </section>

<?php include("shared/footer.php") ?>
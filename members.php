<?php include("shared/main.php") ?>
<?php include("addmember.php") ?>
<?php include("viewmember.php") ?>
<?php include("editmember.php") ?>
    <section class="content">
        <div class="container-fluid">
            <br>
            <div class="row memberimage">
            </div>
            <div class="row">
                <button type="button" class="btn btn-info Addmemberbutton" data-backdrop="static" data-keyboard="false"
                        data-toggle="modal" data-target="#modal-xl">
                    Add Member
                </button>
            </div>
            <br>
            <div class="row">
                <table id="custTable" class="addmembertable table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Mobile Phone</th>
                        <th>Email Address</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Ahmed</td>
                        <td>khaled</td>
                        <td>01111111111</td>
                        <td>ahmed@email.com</td>
                        <td>
                            <div class="btn-group tablebuttons">
                                <button class="btn btn-info" data-backdrop="static" data-keyboard="false"
                                        data-toggle="modal" data-target="#modal-xllll">View
                                </button>
                                <button class="btn btn-info" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#editmember">edit</button>
                                <button type="button" class="btn btn-danger btn-sm ">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Mohamed</td>
                        <td>youssef</td>
                        <td>01222222222</td>
                        <td>mohamed@email.com</td>
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
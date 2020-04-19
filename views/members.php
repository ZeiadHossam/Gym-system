<?php include("../shared/main.php") ?>
<?php include("addmember.php") ?>
<?php include("delete.php") ?>
    <section class="content">
        <div class="container-fluid">
            <br>
            <div class="row memberimage">
            </div>
            <div class="row">
                <button type="button" class="btn btn-info Addmemberbutton" data-backdrop="static" data-keyboard="false"
                        data-toggle="modal" data-target="#modal-members">
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
                                    <a href="viewmember.php" class="btn btn-secondary btn-sm">View</a>
                                    <a href="editmember.php" class="btn btn-info btn-sm">edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#modal-delete">
                                        Delete
                                    </button>
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
								<a href="viewmember.php" class="btn btn-secondary btn-sm" >View</a>
								<a href="editmember.php" class="btn btn-info btn-sm" >edit</a>
								<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete">
									Delete
								</button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </section>
<?php include("../shared/footer.php") ?>
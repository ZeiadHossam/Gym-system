<div class="modal fade" id="modal-employee">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">

                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">


                                    <div class="card-body">
                                        <form role="form" action="backend/controllingemployee.php" enctype="multipart/form-data" method="get">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                                           placeholder="Enter email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*First Name</label>
                                                    <input type="text"  name="fname" class="form-control" maxlength="15"
                                                           placeholder="First Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*Last Name</label>
                                                    <input type="text" name="lname" class="form-control" maxlength="15"
                                                           placeholder="Last Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">user Name</label>
                                                    <input type="text" name="username" class="form-control" placeholder="user name"
                                                           required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input type="password" name="password" class="form-control"
                                                           id="exampleInputPassword1" placeholder="Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">date added </label>
                                                    <input type="date" name="dateadded" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputFile">PersonalImage</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input name="img" class="form-control-file" type="file"
                                                                   id="img" accept="image/gif, image/jpeg, image/png"/
                                                            required>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>

                                            <div class="col-md-6">


                                                <div class="form-group">
                                                    <label>*department </label>

                                                    <select name="usertype" class="form-control">

                                                        <option>admin</option>
                                                        <option>Reception</option>
                                                    </select>

                                                </div>

                                                <div class="form-group">
                                                    <label>*gender </label>

                                                    <select name="gender" class="form-control">

                                                        <option>male</option>
                                                        <option>female</option>
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">HOME phone</label>
													<input type="number" name="homephone" class="form-control numbers" maxlength="8"
                                                           placeholder="home phone" >
                                                </div>


                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">*phone number</label>
													<input type="number" name="phonenumber" class="form-control numbers" maxlength="10"
                                                           placeholder="phone number" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">*birthday </label>
													<input type="date" name="birthday" min="1900-01-01" max="2020-03-29" class="form-control" required>
                                                </div>
										   </div>
                                        </div>
                                    </div>
                                    <button type="submit" name='addemployee' class="btn btn-block btn-primary">Add employee</button>
                            </div>

                                </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-block btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
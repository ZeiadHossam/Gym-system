<div class="modal fade" id="modal-members">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Member</h4>
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



                            <form role="form" action="backend/controllingmember.php" enctype="multipart/form-data" method="get">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" name="email" class="form-control"
                                                           id="exampleInputEmail1"
                                                           placeholder="Enter email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*First Name</label>
                                                    <input type="text" name="fname" class="form-control" maxlength="15"
                                                           placeholder="First Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*Last Name</label>
                                                    <input type="text" name="lname" class="form-control" maxlength="15"
                                                           placeholder="Last Name" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputFile">PersonalImage</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input name="img" class="form-control-file" type="file"
                                                                   id="img" accept="image/gif, image/jpeg, image/png"/
                                                            >
                                                        </div>

                                                    </div>
                                                </div>

                                                <b> *Personal Address</b>
                                                <br>
                                                <div class="form-group">

					<textarea rows="6" cols="60" name="personaddress">
					</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>work phone</label>
                                                    <input type="text" name="workphone" class="form-control"
                                                           maxlength="8"
                                                           placeholder="work phone">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">fax number</label>
                                                    <input type="text" name="faxnumber" class="form-control"
                                                           maxlength="10"
                                                           placeholder="Fax number">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">*phone number</label>
                                                    <input type="text" name="phonenumbers" class="form-control"
                                                           maxlength="10"
                                                           placeholder="phone number" required>
                                                </div>

                                                <br>
                                            </div>

                                            <div class="col-md-6">
                                                <b> Company Address</b>

                                                <div class="form-group">

					<textarea rows="6" cols="60" name="companyaddress">
					</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*Birthday </label>
                                                    <input type="date" name="birthday" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label >companyName </label>
                                                    <input type="text" name="companyname" class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label >AddedBy </label>
                                                    <input type="text" name="addedby" class="form-control" >
                                                </div>

                                                <b>*Gender</b>


                                                <div class="form-group">

                                                    <select class="form-control" name="gender">
                                                        <option class="hidden" selected >gender</option>
                                                        <option>male</option>
                                                        <option>female</option>
                                                        <option></option>
                                                    </select>
                                                    <b>Marriedstatus</b>
                                                    <div class="form-group">

                                                        <select class="form-control" name="marriedstaus">
                                                            <option class="hidden">single</option>
                                                            <option>married</option>
                                                            <option>divorsed</option>
                                                            <option></option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">HOME phone</label>
                                                        <input type="text" name="homephone" class="form-control" maxlength="8"
                                                               placeholder="home phone" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">emergency number</label>
                                                        <input type="text" name="emergency" class="form-control" maxlength="10"
                                                               placeholder="emergency number" >
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name='addmember' class="btn btn-block btn-primary">Add Member</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
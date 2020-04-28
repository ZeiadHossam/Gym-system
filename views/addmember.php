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


                            <form role="form" action="../Controller/member_controller.php" enctype="multipart/form-data"
                                  method="post">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">*Email Address</label>
                                                    <input type="email" name="email" class="form-control"
                                                           onkeyup="validate_email_input()"
                                                           onfocusout="validate_email()" id="Email1"
                                                           placeholder="Enter Email" required>
                                                    <span class="message" id="emailmessage"></span>

                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*First Name</label>
                                                    <input type="text" name="fname" onfocusout="validate_firstname()"
                                                           id="fname" class="form-control" maxlength="15"
                                                           placeholder="First Name" required>
                                                    <span class="message" id="firstName_message"></span>

                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*Last Name</label>
                                                    <input type="text" name="lname" id="lname" class="form-control"
                                                           maxlength="15"
                                                           placeholder="Last Name" onfocusout="validate_lastname()"
                                                           required>
                                                    <span class="message" id="lastName_message"></span>

                                                </div>


                                                <div class="form-group">
                                                    <label>Work Phone</label>
                                                    <input type="number" name="WorkPhone" class="form-control numbers"
                                                           placeholder="Work Phone">
                                                </div>
                                                <div class="form-group">
                                                    <label for="FaxNumber">Fax Number</label>
                                                    <input type="number" name="faxnumber" class="form-control numbers"
                                                           placeholder="Fax Number">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">*Mobile Phone</label>
                                                    <input type="number" name="phonenumber"
                                                           class="form-control numbers"
                                                           placeholder="Phone Number" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*Birthday </label>
                                                    <input type="date" min="1900-01-01" max="2020-03-29" name="birthday"
                                                           class="form-control" required>
                                                </div>

                                                <b>*Gender</b>
                                                <div class="form-group">
                                                    <select class="form-control" name="gender">
                                                        <option class="hidden" disabled selected>gender</option>
                                                        <option>male</option>
                                                        <option>female</option>
                                                    </select>
                                                </div>
                                                <b>*Married Status</b>
                                                <div class="form-group">

                                                    <select class="form-control" name="marriedStatus">
                                                        <option class="hidden" disabled selected>Married Status</option>
                                                        <option>single</option>
                                                        <option>married</option>
                                                        <option>divorsed</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Home Phone</label>
                                                    <input type="number" name="homephone" class="form-control numbers"
                                                           placeholder="Home Phone">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Personal Image</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input name="Pimage" class="form-control-file" type="file"
                                                                   onchange="showImage(this,'personalImage');"
                                                                   id="img" accept="image/gif, image/jpeg, image/png"/>
                                                        </div>
                                                        <br>
                                                        <img id="personalImage" src="http://placehold.it/100"/>

                                                    </div>
                                                </div>
                                                <b> *Personal Address</b>
                                                <br>
                                                <div class="form-group">

					<textarea rows="6" cols="60" name="personaddress">
					</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Company Name </label>
                                                    <input type="text" PLACEHOLDER="Company Name" name="CompanyName"
                                                           class="form-control">
                                                </div>
                                                <b> Company Address</b>

                                                <div class="form-group">

					<textarea rows="6" cols="60" name="companyaddress">
					</textarea>
                                                </div>


                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Emergency Number</label>
                                                    <input type="number" name="emergency" class="form-control numbers"
                                                           placeholder="Emergency Number">
                                                </div>
                                                <?php if ($_SESSION['branch'] == NULL) { ?>
                                                    <div class="form-group">
                                                        <label>*Branch </label>

                                                        <select name="branch" class="form-control">
                                                            <?php foreach ($gym->getBranchs() as $branch) {
                                                                echo "<option value='" . $branch->getId() . "'>" . $branch->getCity() . "</option>";
                                                            } ?>
                                                        </select>

                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <button type="submit" name='addmember' class="btn btn-block btn-primary">Add Member</button>
                        </form>
                        <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->

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


                            <form role="form" action="/GYM/member/addMember" enctype="multipart/form-data"

                                  method="post" onsubmit=" return submitingmember()">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">*Email Address</label>
                                                    <input type="email" name="email" class="form-control"
                                                           onkeyup="validate_email_input()"
                                                           onfocusout="validate_email()" id="Email1"
                                                           placeholder="Enter Email" >
                                                    <span class="message" id="emailmessage"></span>

                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*First Name</label>
                                                    <input type="text" name="fname" onfocusout="validate_firstname()"
                                                           id="fname" class="form-control"
                                                           placeholder="First Name" >
                                                    <span class="message" id="firstName_message"></span>

                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*Last Name</label>
                                                    <input type="text" name="lname" id="lname" class="form-control"
                                                           maxlength="15"
                                                           placeholder="Last Name" onfocusout="validate_lastname()"
                                                           >
                                                    <span class="message" id="lastName_message"></span>

                                                </div>


                                                <div class="form-group">
                                                    <label>Work Phone</label>
                                                    <input type="text" name="WorkPhone" onkeypress="return onlyNumberKey(event)"
                                                           onfocusout="validate_workphone()" id="workPhone"
                                                           class="form-control numbers" placeholder="Work Phone">
                                                    <span class="message" id="workPhone_message"></span>

                                                </div>
                                                <div class="form-group">
                                                    <label for="FaxNumber">Fax Number</label>
                                                    <input type="text" name="faxnumber"
                                                           onfocusout="validate_faxnumber()" id="faxnumber"
                                                           class="form-control numbers" onkeypress="return onlyNumberKey(event)"
                                                           placeholder="Fax Number">
                                                    <span class="message" id="faxnumber_message"></span>

                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">*Mobile Phone</label>
                                                    <input type="text" name="phonenumber"
                                                           onkeypress="return onlyNumberKey(event)"
                                                           onfocusout="validate_mobilePhone()" id="mobilePhone" maxlength="11"
                                                           class="form-control numbers" placeholder="Phone Number"
                                                           >
                                                    <span class="message" id="mobilePhone_message"></span>

                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*Birthday </label>
                                                    <input type="date" name="birthday"
                                                           onfocusout="validate_date()" id="birthDate"
                                                           class="form-control" >
                                                    <span class="message" id="birthDate_message"></span>


                                                </div>

                                                <b>*Gender</b>
                                                <div class="form-group">
                                                    <select class="form-control" id="gender" onfocusout="validate_Gender()" name="gender">
                                                        <option class="hidden" selected disabled>Select Gender</option>
                                                        <option>male</option>
                                                        <option>female</option>
                                                    </select>
                                                    <span class="message" id="gender_message"></span>

                                                </div>
                                                <b>*Married Status</b>
                                                <div class="form-group">

                                                    <select class="form-control" onfocusout="validate_MarriedStatus()" id="marriedStatus" name="marriedStatus">
                                                        <option class="hidden" disabled selected>Select Married Status</option>
                                                        <option>Single</option>
                                                        <option>Married</option>
                                                        <option>Divorsed</option>
                                                    </select>
                                                    <span class="message" id="marriedStatus_message"></span>

                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Home Phone</label>
                                                    <input type="text" name="homephone"
                                                           onkeypress="return onlyNumberKey(event)"
                                                           onfocusout="validate_homePhone()" id="homePhone"
                                                           class="form-control numbers"
                                                           placeholder="Home Phone">
                                                    <span class="message" id="homePhone_message"></span>
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
                                                <b> Personal Address</b>
                                                <br>
                                                <div class="form-group">

					<textarea rows="6" cols="60" name="personaddress">
					</textarea>

                                                </div>
                                                <div class="form-group">
                                                    <label>Company Name </label>
                                                    <input type="text" PLACEHOLDER="Company Name" name="CompanyName"
                                                           onfocusout="validate_companyname()" id="companyname"
                                                           class="form-control">
                                                    <span class="message" id="companyname_message"></span>

                                                </div>
                                                <b> Company Address</b>

                                                <div class="form-group">

					<textarea rows="6" cols="60" name="companyaddress">
					</textarea>
                                                </div>


                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Emergency Number</label>
                                                    <input type="text" name="emergency"
                                                           onfocusout="validate_emergencynumber()" id="emergencynumber"
                                                           class="form-control numbers" onkeypress="return onlyNumberKey(event)"
                                                           placeholder="Emergency Number">

                                                    <span class="message" id="emergencynumber_message"></span>
                                                </div>
                                                <?php if ($_SESSION['branch'] == NULL) { ?>
                                                    <div class="form-group">
                                                        <label>*Branch </label>

                                                        <select name="branch" id="branch" onfocusout="validate_Branch()" class="form-control">
                                                            <option class="hidden" disabled selected>Select Branch</option>
                                                            <?php foreach ($gym->getBranchs() as $branch) {
                                                                echo "<option value='" . $branch->getId() . "'>" . $branch->getCity() . "</option>";
                                                            } ?>
                                                        </select>
                                                        <span class="message" id="branch_message"></span>

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

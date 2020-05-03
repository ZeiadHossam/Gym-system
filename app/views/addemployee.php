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
                                    <form role="form" action="/GYM/employee/addEmployee"
                                          enctype="multipart/form-data" method="get"
                                          onsubmit="return submitAddEmp()">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">*Email Address</label>
                                                    <input type="email" onkeyup="validate_email_input()"
                                                           onfocusout="validate_email()" name="email"
                                                           class="form-control"
                                                           id="Email1"
                                                           placeholder="Enter Email" >
                                                    <span class="message" id="emailmessage"></span>

                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*First Name</label>
                                                    <input type="text" id="fname" name="fname"
                                                           onfocusout="validate_firstname()" class="form-control"
                                                           placeholder="First Name" >
                                                    <span class="message" id="firstName_message"></span>

                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*Last Name</label>
                                                    <input type="text" id="lname" onfocusout="validate_lastname() "
                                                           name="lname" class="form-control"
                                                           placeholder="Last Name" >
                                                    <span class="message" id="lastName_message"></span>

                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*UserName</label>
                                                    <input type="text" id="username" onfocusout="validate_userName()"
                                                           name="username" class="form-control"
                                                           placeholder="UserName"
                                                           >
                                                    <span class="message" id="userName_message"></span>

                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">*Password</label>
                                                    <input type="password" id="password"
                                                           onfocusout="validate_password()" name="password"
                                                           class="form-control"
                                                           id="exampleInputPassword1" placeholder="Password" >
                                                    <span class="message" id="password_message"></span>

                                                </div>
                                                <div class="form-group">
                                                    <label>*Department </label>

                                                    <select name="usertype" class="form-control" id="department" onfocusout="validate_Department()">
                                                        <option class="hidden"  selected disabled>Select Department</option>
                                                        <?php foreach ($gym->getUsertypes() as $dep) {
                                                            if ($dep->getName() != "Owner") {
                                                                echo "<option value='" . $dep->getId() . "'>" . $dep->getName() . "</option>";
                                                            }
                                                        } ?>
                                                    </select>
                                                    <span class="message" id="department_message"></span>

                                                </div>
                                                <?php if ($_SESSION['branch'] == NULL) { ?>
                                                    <div class="form-group">
                                                        <label>*Branch </label>

                                                        <select name="branch" id="branch" onfocusout="validate_Branch()" class="form-control">
                                                            <option class="hidden" selected disabled>Select Branch</option>
                                                            <?php foreach ($gym->getBranchs() as $branch) {
                                                                echo "<option value='" . $branch->getId() . "'>" . $branch->getCity() . "</option>";
                                                            } ?>
                                                        </select>
                                                        <span class="message" id="branch_message"></span>

                                                    </div>
                                                <?php } ?>


                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">PersonalImage</label>
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
                                                <div class="form-group">
                                                    <label>*Gender </label>

                                                    <select name="gender" id="gender" onfocusout="validate_Gender()" class="form-control">
                                                        <option class="hidden" selected disabled>Select Gender</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                    <span class="message" id="gender_message"></span>

                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">HOME phone</label>
                                                    <input type="text"
                                                           onfocusout="validate_homePhone()" id="homePhone"
                                                           name="homephone" class="form-control numbers" maxlength="8"
                                                           placeholder="home phone" onkeypress="return onlyNumberKey(event)">
                                                    <span class="message" id="homePhone_message"></span>

                                                </div>


                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">*Mobile Phone</label>
                                                    <input type="text" onkeypress="return onlyNumberKey(event)"
                                                           onfocusout="validate_mobilePhone()" id="mobilePhone"
                                                           name="phonenumber" class="form-control numbers"
                                                           maxlength="11"
                                                           placeholder="phone number" >
                                                    <span class="message" id="mobilePhone_message"></span>

                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">*Birthday </label>
                                                    <input type="date" onfocusout="validate_date()" id="birthDate"
                                                           name="birthday" min="1900-01-01" max="2005-3-29"
                                                           class="form-control" onclick=" maximumDate()"">
                                                    <span class="message" id="birthDate_message"></span>

                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <button type="submit" name='addemployee' class="btn btn-block btn-primary">Add
                                    employee
                                </button>
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
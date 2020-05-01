<?php
$employee=$data['employee'];

?>


<div class="container-fluid">
    <div class="row">

        <!-- left column -->
        <div class="col-md-10 offset-md-1">
            <!-- general form elements -->


            <form role="form" action="/GYM/employee/editEmployee" onsubmit="return sumbittingempform()" enctype="multipart/form-data" method="post">
                <div class="row view_emp">
                    <div class="col-md-1">
                        <a href="javascript:history.go(-1)" class="btn btn-md btn-default"><span
                                    class="fa fa-angle-left"></span></a>

                    </div>
                    <div class="col-md-4 offset-3">

                        <legend class="viewHeader">Edit <?php echo $employee->getFirstName(); ?></legend>
                    </div>
                </div>
                    <input type="text" value="<?php echo $data['branchId'] ;?>" name="branchId" hidden>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" class="form-control" id="id" name="employeeEditId"
                                   value="<?php echo $employee->getId(); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">*Email address</label>
                            <input type="email"  onkeyup="validate_email_input()"
                                   onfocusout="validate_email()" name="email"
                                   id="Email1"class="form-control"
                                   placeholder="Enter email" value="<?php echo $employee->getEmail(); ?>" >
                            <span class="message" id="emailmessage"></span>

                        </div>
                        <div class="form-group">
                            <label for="fname">*First Name</label>
                            <input type="text"
                                   onfocusout="validate_firstname()" id="fname" name="firstName" class="form-control"
                                   placeholder="First Name" value="<?php echo $employee->getFirstName(); ?>" >
                            <span class="message" id="firstName_message"></span>

                        </div>
                        <div class="form-group">
                            <label for="lname">*Last Name</label>
                            <input type="text" onfocusout="validate_lastname()" id="lname" name="lname"class="form-control"
                                   value="<?php echo $employee->getLastName(); ?>"
                                   maxlength="15"
                                   placeholder="Last Name" >
                            <span class="message" id="lastName_message"></span>
                        </div>

                        <div class="form-group">
                            <label>*Department </label>

                            <select class="form-control" name="usertype">


                                <?php foreach ($gym->getUsertypes() as $dep) {
                                    if ($dep->getName() != "Owner") {
                                        echo "<option value='" . $dep->getId() . "'" ?><?php if ($dep->getId() == $employee->getUsertype()->getId()) { ?> selected <?php }
                                        echo " >" . $dep->getName() . "</option>";
                                    }
                                } ?>

                            </select>


                        </div>
                        <div class="form-group">
                            <label>*Gender </label>

                            <select class="form-control" name="gender">

                                <option
                                    <?php if ($employee->getGender() == 'Male' || $employee->getGender() == 'male'){ ?>selected <?php } ?> >
                                    Male
                                </option>
                                <option
                                    <?php if ($employee->getGender() == 'Female' || $employee->getGender() == 'female'){ ?>selected <?php } ?> >
                                    Female
                                </option>

                            </select>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Image">PersonalImage</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="img" class="form-control-file" type="file"
                                           onchange="showImage(this,'personalImage');"
                                           id="img" accept="image/gif, image/jpeg, image/png"/
                                    >
                                </div>
                                <br>
                                <img id="personalImage" src="/GYM/public/img/<?php echo $employee->getImage(); ?>"/>

                            </div>
                        </div>
                        <?php if ($_SESSION['branch'] == NULL) { ?>
                            <div class="form-group">
                                <label>*Branch </label>

                                <select name="branch" name="branch" class="form-control">
                                    <?php foreach ($gym->getBranchs() as $branch) {
                                        if($branch->getId()==$data['branchId'])
                                        {
                                            echo "<option value='" . $branch->getId() . "' selected>" . $branch->getCity() . "</option>";
                                        }
                                        else
                                        {

                                            echo "<option value='" . $branch->getId() . "'>" . $branch->getCity() . "</option>";
                                        }
                                    } ?>
                                </select>

                            </div>
                        <?php } ?>




                        <div class="form-group">
                            <label for="mobilePhone">*Mobile Phone</label>
                            <input type="text" name="mobilePhone" onfocusout="validate_mobilePhone()" id="mobilePhone" MAXLENGTH="11"
                                   class="form-control"
                                   placeholder="Mobile Phone" value="<?php echo $employee->getMobilePhone(); ?>"
                                   >
                            <span class="message" id="mobilePhone_message"></span>

                        </div>
                        <div class="form-group">
                            <label for="birthday">*Birthday </label>
                            <input type="date" class="form-control" name="birthday" onfocusout="validate_date()" id="birthDate"
                                   value="<?php echo $employee->getBirthDay(); ?>"
                                   >
                            <span class="message" id="birthDate_message"></span>

                        </div>
                        <div class="form-group">
                            <label for="HomePhone">HOME Phone</label>
                            <input type="text" onfocusout="validate_homePhone()"
                                   id="homePhone" MAXLENGTH="8" name="homePhone" class="form-control"
                                   placeholder="Home Phone" value="<?php echo $employee->getHomePhone(); ?>">
                            <span class="message" id="homePhone_message"></span>

                        </div>

                    </div>
                </div>
                <button type="submit" name="editEmployee" class="btn btn-primary Addmemberbutton ">Submit</button>
            </form>
        </div>
    </div>
</div>


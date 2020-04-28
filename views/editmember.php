<?php include("../shared/main.php");
$branch = $gym->getBranchs()[$_GET['branchId']];
$member = $branch->getMembers()[$_GET['memberId']];

?>
    <div class="container-fluid">
        <div class="row">

            <!-- left column -->
            <div class="col-md-10 offset-md-1">
                <!-- general form elements -->


                <form role="form" action="viewmember.php" enctype="multipart/form-data" method="post">
                    <div class="row view_emp">
                        <div class="col-md-1">
                            <a href="javascript:history.go(-1)" class="btn btn-md btn-default"><span
                                        class="fa fa-angle-left"></span></a>

                        </div>
                        <div class="col-md-4 offset-3">

                            <legend class="viewHeader">Edit <?php echo $member->getFirstName(); ?> Information</legend>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id">ID</label>
                                <input type="text" class="form-control" id="id" name="memberEditId"
                                       value="<?php echo $member->getId(); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">*Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       value=<?php echo $member->getEmail(); ?>>
                            </div>
                            <div class="form-group">
                                <label for="fname">*First Name</label>
                                <input type="text" class="form-control" name="firstName"
                                       value=<?php echo $member->getFirstName(); ?>>
                            </div>
                            <div class="form-group">
                                <label for="lname">*Last Name</label>
                                <input type="text" name="lastName" class="form-control"
                                       value=<?php echo $member->getLastName() ?>>
                            </div>

                            <div class="form-group">
                                <label>Work Phone</label>
                                <input type="text" name="workPhone" class="form-control"
                                       value=<?php echo $member->getWorkPhone(); ?>>
                            </div>
                            <div class="form-group">
                                <label for="faxNumber">Fax Number</label>
                                <input type="text" name="faxNumber" class="form-control"
                                       value=<?php echo $member->getFaxNumber(); ?>>
                            </div>

                            <div class="form-group">
                                <label for="mobilePhone">*Mobile Phone</label>
                                <input type="text" name="mobilePhone" class="form-control"
                                       value=<?php echo $member->getMobilePhone(); ?>>
                            </div>
                            <div class="form-group">
                                <label for="homePhone">HOME phone</label>
                                <input type="text" name="homePhone" class="form-control"
                                       value=<?php echo $member->getHomePhone(); ?>>
                            </div>
                            <div class="form-group">
                                <label for="emergency">Emergency number</label>
                                <input type="text" name="emergency" class="form-control"
                                       value=<?php echo $member->getEmergencyNumber(); ?>>
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
                                    <img id="personalImage" src="../public/img/<?php echo $member->getImage(); ?>"/>

                                </div>
                            </div>

                                        <div class="form-group">
                                            <label>*Gender </label>

                                            <select class="form-control" name="gender">

                                                <option
                                                    <?php if ($member->getGender() == 'Male' || $member->getGender() == 'male'){ ?>selected <?php } ?> >
                                                    Male
                                                </option>
                                                <option
                                                    <?php if ($member->getGender() == 'Female' || $member->getGender() == 'female'){ ?>selected <?php } ?> >
                                                    Female
                                                </option>

                                            </select>
                                        </div>
                                        <div class="form-group" name="marriedStatus">
                                            <b>*Married Status</b>

                                            <select class="form-control">
                                                <option
                                                    <?php if ($member->getMarriedStatus() == 'Single' || $member->getMarriedStatus() == 'single'){ ?>selected <?php } ?>>
                                                    Single
                                                </option>
                                                <option
                                                    <?php if ($member->getMarriedStatus() == 'Married' || $member->getMarriedStatus() == 'married'){ ?>selected <?php } ?>>
                                                    Married
                                                </option>
                                                <option
                                                    <?php if ($member->getMarriedStatus() == 'Divorsed' || $member->getMarriedStatus() == 'divorsed'){ ?>selected <?php } ?>>
                                                    Divorsed
                                                </option>
                                                <option></option>
                                            </select>
                                        </div>

                            <div class="form-group">
                                <label for="companyName">Company Name</label>
                                <input type="text" name="companyName" class="form-control"
                                       value=<?php echo $member->getCompanyName(); ?>>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>*Personal Address</b>
                                        <div class="form-group">
                            <textarea name="personalAddress" rows="5" cols="30"> <?php echo $member->getAddress(); ?>
					        </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Company Address</b>
                                        <div class="form-group">

					<textarea rows="5" name="companyAddress" cols="30"><?php echo $member->getCompanyAddress(); ?>
					</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birthday">*Birthday </label>
                                <input type="date" name="birthday" value="<?php echo $member->getBirthDay(); ?>" class="form-control">
                            </div>

                            <?php if ($_SESSION['branch'] == NULL) { ?>
                                <div class="form-group">
                                    <label>*Branch </label>

                                    <select name="branch" name="branch" class="form-control">
                                        <?php foreach ($gym->getBranchs() as $branch) {
                                            if($branch->getId()==$_GET['branchId'])
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


                        </div>
                    </div>

                    <button type="button" class="btn btn-primary Addmemberbutton ">Edit Member</button>
                </form>
            </div>
        </div>
    </div>

<?php include("../shared/footer.php") ?>
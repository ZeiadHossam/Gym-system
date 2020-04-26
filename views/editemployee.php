<?php include("../shared/main.php");
$employee=$gym->getBranchs()[$_GET['branchId']]->getEmployees()[$_GET['empId']];

?>


<div class="container-fluid">
    <div class="row">

        <!-- left column -->
        <div class="col-md-10 offset-md-1">
            <!-- general form elements -->


                <form role="form" action="editemployee.php" enctype="multipart/form-data" method="post">
                    <div class="row view_emp">
                        <div class="col-md-1">
                            <a href="javascript:history.go(-1)" class="btn btn-md btn-default"><span class="fa fa-angle-left"></span></a>

                        </div>
                        <div class="col-md-4 offset-3">

                            <legend class="viewHeader">Edit <?php echo $employee->getFirstName(); ?></legend>
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">*Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                           placeholder="Enter email" value="<?php echo $employee->getEmail(); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="fname">*First Name</label>
                                    <input type="text" class="form-control" maxlength="15"
                                           placeholder="First Name" value="<?php echo $employee->getFirstName(); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="lname">*Last Name</label>
                                    <input type="text" class="form-control" value="<?php echo $employee->getLastName(); ?>" maxlength="15"
                                           placeholder="Last Name" required>
                                </div>

                                <div class="form-group">
                                    <label>*Department </label>

                                    <select class="form-control">

                                        <?php foreach ($gym->getUsertypes() as $dep){
                                            if($dep->getName()!="Owner") {
                                                echo "<option value='" . $dep->getId() . "'" ?><?php if($dep->getId()==$employee->getUsertype()->getId()){ ?> selected <?php    } echo " >" . $dep->getName() . "</option>";
                                            } } ?>

                                    </select>


                                </div>
                                <div class="form-group">
                                    <label>*Gender </label>

                                    <select class="form-control">

                                        <option <?php if($employee->getGender()=='Male'||$employee->getGender()=='male'){ ?>selected <?php } ?> >Male</option>
                                        <option <?php if($employee->getGender()=='Female'||$employee->getGender()=='female'){ ?>selected <?php } ?> >female</option>

                                    </select>
                                </div>
                            </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputFile">PersonalImage</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="img" class="form-control-file" type="file" onchange="showImage(this,'personalImage');"
                                               id="img" accept="image/gif, image/jpeg, image/png"/
                                        required>
                                    </div>
                                    <br>
                                    <img id="personalImage" src="../public/img/<?php echo $employee->getImage(); ?>"/>

                                </div>
                            </div>







                                <div class="form-group">
                                    <label for="exampleInputEmail1">HOME Phone</label>
                                    <input type="text" class="form-control" maxlength="8"
                                           placeholder="Home Phone" value="<?php echo $employee->getHomePhone(); ?>" required>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">*Mobile Phone</label>
                                    <input type="text" class="form-control" maxlength="10"
                                           placeholder="Mobile Phone" value="<?php echo $employee->getMobilePhone(); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">*Birthday </label>
                                    <input type="date" class="form-control" value="<?php echo $employee->getBirthDay(); ?>" required>
                                </div>


                            </div>
                        </div>
					<button type="submit" class="btn btn-primary Addmemberbutton ">Submit</button>
                </form>
        </div>
    </div>
</div>

<?php include("../shared/footer.php") ?>

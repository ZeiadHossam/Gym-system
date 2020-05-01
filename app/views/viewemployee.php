
                <div class="container-fluid ">
                    <div class="row">
                        <?php
                        $employee=$data['employee'];
                        ?>
                        <!-- left column -->
                        <div class="col-md-10 offset-md-1">
                            <!-- general form elements -->

                                <form role="form" action="viewemployee.php" enctype="multipart/form-data" method="post">
                                    <div class="row view_emp">
                                        <div class="col-md-1">
                                            <a href="javascript:history.go(-1)" class="btn btn-md btn-default"><span class="fa fa-angle-left"></span></a>

                                        </div>
                                        <div class="col-md-4 offset-3">

                                            <legend class="viewHeader"><?php echo $employee->getFirstName(); ?> Information</legend>
                                        </div>
                                    </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id">ID</label>
                                                    <input type="text" class="form-control" id="id"
                                                           value="<?php echo $employee->getId(); ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                           value="<?php echo $employee->getEmail(); ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">First Name</label>
                                                    <input type="text" class="form-control" maxlength="15"
                                                           value="<?php echo $employee->getFirstName(); ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lname">Last Name</label>
                                                    <input type="text" value="<?php echo $employee->getLastName(); ?>" class="form-control" readonly>
                                                </div>



                                                <div class="form-group">
                                                    <label>Department </label>

                                                    <select class="form-control" disabled>

                                                        <option selected ><?php echo $employee->getUsertype()->getName();?></option>

                                                    </select>


                                                </div>
                                                <?php if($branchName==""){?>
                                                    <div class="form-group">
                                                        <label>Branch </label>

                                                        <select name="branch" class="form-control" disabled>
                                                            <option disabled selected><?php echo $gym->getBranchs()[$data['branchId']]->getCity(); ?></option>;
                                                        </select>

                                                    </div>
                                                <?php } ?>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                    <label>Image :</label>

                                                    </div>
                                                    <div class="col-md-4 offset-md-6">

                                                        <img id="personalImage" src="/GYM/public/img/<?php echo $employee->getImage(); ?>"/>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label>Gender </label>

                                                    <select class="form-control" disabled>

                                                        <option selected ><?php echo $employee->getGender();?></option>

                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">HOME phone</label>
                                                    <input type="text" value="<?php echo $employee->getHomePhone(); ?>" class="form-control" readonly>
                                                </div>


                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Mobile Phone</label>
                                                    <input type="text" value="<?php echo $employee->getMobilePhone(); ?>" class="form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Birthday </label>
                                                    <input type="date" value="<?php echo $employee->getBirthDay(); ?>" class="form-control" readonly>
                                                </div>


                                            </div>
                                        </div>

                                </form>
                        </div>
                    </div>
                </div>

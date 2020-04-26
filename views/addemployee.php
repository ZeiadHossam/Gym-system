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
                                    <form role="form" action="../Controller/employee_controller.php"
                                          enctype="multipart/form-data" method="get">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">*Email Address</label>
                                                    <input type="email" name="email" class="form-control"
                                                           id="exampleInputEmail1"
                                                           placeholder="Enter Email" required>
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
                                                    <label for="fname">*UserName</label>
                                                    <input type="text" name="username" class="form-control"
                                                           placeholder="UserName"
                                                           required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">*Password</label>
                                                    <input type="password" name="password" class="form-control"
                                                           id="exampleInputPassword1" placeholder="Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>*department </label>

                                                    <select name="usertype" class="form-control">
                                                        <?php foreach ($gym->getUsertypes() as $dep){
                                                       if($dep->getName()!="Owner") {
                                                           echo "<option value='" . $dep->getId() . "'>" . $dep->getName() . "</option>";
                                                       } } ?>
                                                    </select>
                                                </div>
                                                <?php if ($_SESSION['branch']==NULL) { ?>
                                                    <div class="form-group">
                                                        <label>*Branch </label>

                                                        <select name="branch" class="form-control">
                                                            <?php foreach ($gym->getBranchs() as $branch){
                                                                echo "<option value='".$branch->getId()."'>".$branch->getCity()."</option>";
                                                            } ?>
                                                        </select>

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

                                                    <select name="gender" class="form-control">

                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">HOME phone</label>
                                                    <input type="number" name="homephone" class="form-control numbers"
                                                           maxlength="8"
                                                           placeholder="home phone">
                                                </div>


                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">*Mobile Phone</label>
                                                    <input type="number" name="phonenumber" class="form-control numbers"
                                                           maxlength="10"
                                                           placeholder="phone number" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">*Birthday </label>
                                                    <input type="date" name="birthday" min="1900-01-01" max="2005-3-29"
                                                           class="form-control" required>
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
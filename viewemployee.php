<?php include("shared/main.php") ?>
                <div class="container-fluid">
                    <div class="row">

                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">


                                <form role="form" action="viewemployee.php" enctype="multipart/form-data" method="post">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                           placeholder="Enter email" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*First Name</label>
                                                    <input type="text" class="form-control" maxlength="15"
                                                           placeholder="First Name" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*Last Name</label>
                                                    <input type="text" class="form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">user Name</label>
                                                    <input type="text" class="form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input type="password" class="form-control"
                                                           id="exampleInputPassword1" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">date added </label>
                                                    <input type="date" class="form-control" readonly>
                                                </div>



                                            </div>

                                            <div class="col-md-6">


                                                <div class="form-group">
                                                    <label>*department </label>

                                                    <select class="form-control">

                                                        <option selected disabled>trainer</option>
                                                        <option disabled>sales</option>
                                                        <option disabled>admin</option>
                                                    </select>


                                                </div>


                                                <div class="form-group">
                                                    <label>*gender </label>

                                                    <select class="form-control">

                                                        <option disabled>male</option>
                                                        <option disabled>female</option>
                                                        <option disabled></option>
                                                    </select>
                                                </div>
                                                <br>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">HOME phone</label>
                                                    <input type="text" class="form-control" readonly>
                                                </div>
                                                <br>


                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">*phone number</label>
                                                    <input type="text" class="form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">*birthday </label>
                                                    <input type="date" class="form-control" readonly>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                </form>
				<a href="javascript:history.go(-1)" class="btn btn-sm btn-default">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include("shared/footer.php") ?>
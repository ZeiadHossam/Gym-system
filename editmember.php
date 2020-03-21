<?php
?>
<div class="modal fade" id="editmember">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Member</h4>
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


                                <form role="form" action="viewmember.php" enctype="multipart/form-data" method="post">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                           value=<?php echo "@hotmail.com" ?> >
                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*First Name</label>
                                                    <input type="text" class="form-control" value=<?php echo "ahmed" ?>>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*Last Name</label>
                                                    <input type="text" class="form-control"
                                                           value=<?php echo "@yasse" ?>>
                                                </div>


                                                <b> *Personal Address</b>
                                                <br>
                                                <div class="form-group">

					<textarea rows="6" cols="30"> <?php echo "tagmo3elkhames" ?>
					</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>work phone</label>
                                                    <input type="text" class="form-control" value=<?php echo "01015" ?>>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">fax number</label>
                                                    <input type="text" class="form-control"
                                                           value=<?php echo "225855" ?>>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">*phone number</label>
                                                    <input type="text" class="form-control"
                                                           value=<?php echo "@hotmail.com" ?>>
                                                </div>

                                                <br>
                                            </div>

                                            <div class="col-md-6">
                                                <b> Company Address</b>
                                                <br>
                                                <div class="form-group">

					<textarea rows="6" cols="30" ><?php echo "@hotmail.com" ?>
					</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*Birthday </label>
                                                    <input type="date" class="form-control">
                                                </div>


                                                <b>*Gender</b>


                                                <div class="form-group">

                                                    <select class="form-control">
                                                        <option class="hidden" selected >gender</option>
                                                        <option >male</option>
                                                        <option >female</option>
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <br>
                                                <b>Marriedstatus</b>


                                                <div class="form-group">

                                                    <select class="form-control">
                                                        <option class="hidden">single</option>
                                                        <option >married</option>
                                                        <option >divorsed</option>
                                                        <option></option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">HOME phone</label>
                                                    <input type="text" class="form-control" value=<?php echo "25888" ?>>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">emergency number</label>
                                                    <input type="text" class="form-control"
                                                           value=<?php echo "0144444444" ?>>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

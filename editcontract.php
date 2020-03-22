<?php include("shared/main.php") ?>

                <div class="container-fluid">
                    <div class="row">

                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">


                                <form role="form" action="addcontract.php" enctype="multipart/form-data" method="post">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>*contract type </label>

                                                    <select class="form-control">

                                                        <option>15 session</option>
                                                        <option>30 session</option>
                                                        <option>45 session</option>

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>*package type </label>

                                                    <select class="form-control">

                                                        <option></option>
                                                        <option></option>
                                                        <option></option>

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*member Name</label>
                                                    <input type="text" class="form-control" placeholder="member Name"
                                                           required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">today date</label>
                                                    <input type="date" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*start date</label>
                                                    <input type="date" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>*end date</label>
                                                    <input type="date" class="form-control" required>
                                                </div>


                                                <div class="form-group">
                                                    <label>*issue date</label>
                                                    <input type="date" class="form-control" required>
                                                </div>


                                            </div>

                                            <div class="col-md-6">
                                                <b> notes </b>
                                                <br>
                                                <div class="form-group">

					<textarea rows="6" cols="60">
					</textarea>
                                                </div>


                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Sale</label>
                                                    <input type="text" class="form-control" placeholder="sale "
                                                           required>
                                                </div>
                                                <div class="form-group">
                                                    <label>*payment method </label>

                                                    <select class="form-control">
                                                        <option class="hidden" selected>cash</option>
                                                        <option>visa</option>

                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>*amount paid</label>
                                                    <input type="text" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>*amount due</label>
                                                    <input type="text" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>*amount due date</label>
                                                    <input type="date" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>*Discount </label>

                                                    <select class="form-control">
                                                        <option class="hidden" selected>0%</option>
                                                        <option>10%</option>
                                                        <option>25%</option>
                                                        <option>50%</option>

                                                        <option></option>
                                                    </select>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

					<button type="submit" class="btn btn-primary Addmemberbutton ">Edit contract</button>
                                </form>
				<a href="javascript:history.go(-1)" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
        
<?php include("shared/footer.php") ?>

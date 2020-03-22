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

                                                        <option disabled>15 session</option>
                                                        <option disabled>30 session</option>
                                                        <option disabled>45 session</option>

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>*package type </label>

                                                    <select class="form-control">

                                                        <option disabled>personal trainer</option>
                                                        <option disabled></option>
                                                        <option disabled></option>

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*member Name</label>
                                                    <input type="text" class="form-control" placeholder="member Name"
                                                           readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">today date</label>
                                                    <input type="date" class="form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fname">*start date</label>
                                                    <input type="date" class="form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>*end date</label>
                                                    <input type="date" class="form-control" readonly>
                                                </div>


                                                <div class="form-group">
                                                    <label>*issue date</label>
                                                    <input type="date" class="form-control" readonly>
                                                </div>


                                            </div>

                                            <div class="col-md-6">
                                                <b> notes </b>
                                                <br>
                                                <div class="form-group">

					<textarea rows="6" cols="60" readonly>
					</textarea>
                                                </div>


                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Sale</label>
                                                    <input type="text" class="form-control" placeholder="sale "
                                                           readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>*payment method </label>

                                                    <select class="form-control">
                                                        <option class="hidden"  disabled>cash</option>
                                                        <option disabled>visa</option>

                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>*amount paid</label>
                                                    <input type="text" class="form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>*amount due</label>
                                                    <input type="text" class="form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>*amount due date</label>
                                                    <input type="date" class="form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>*Discount </label>

                                                    <select class="form-control">
                                                        <option class="hidden" selected disabled>0%</option>
                                                        <option disabled>10%</option>
                                                        <option disabled>25%</option>
                                                        <option disabled>50%</option>

                                                        <option></option>
                                                    </select>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                </form>
				<a href="viewmember.php" class="btn btn-info">View Member</a>
				<a href="javascript:history.go(-1)" class="btn btn-default" >Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include("shared/footer.php") ?>
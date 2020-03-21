<?php
?>
<div class="modal fade" id="viewcontract">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View contract</h4>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>

</div>

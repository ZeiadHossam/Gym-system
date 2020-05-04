<?php
$member=$data['member'];
$branch=$gym->getBranchs()[$data['branchId']];
$branchName=$gym->getBranchs()[$data['branchId']]->getCity();
?>
    <div class="container-fluid">
        <div class="row">

            <!-- left column -->
            <div class="col-md-10 offset-md-1">
                <!-- general form elements -->


                    <form role="form" method="post">
                        <div class="row view_emp">
                            <div class="col-md-1">
                                <a href="javascript:history.go(-1)" class="btn btn-md btn-default"><span class="fa fa-angle-left"></span></a>

                            </div>
                            <div class="col-md-4 offset-3">

                                <legend class="viewHeader"><?php echo $member->getFirstName(); ?> Information</legend>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id">ID</label>
                                        <input type="text" class="form-control" id="id" name="Id"
                                               value="<?php echo $member->getId(); ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                               value="<?php echo $member->getEmail() ; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control" value="<?php echo $member->getFirstName(); ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" value="<?php echo $member->getLastName(); ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Work Phone</label>
                                        <input type="text" class="form-control" value="<?php echo $member->getWorkPhone(); ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="FaxNumber">Fax Number</label>
                                        <input type="text" class="form-control" value="<?php echo $member->getFaxNumber(); ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="MobilePhone">Mobile Phone</label>
                                        <input type="text" class="form-control"
                                               value="<?php echo $member->getMobilePhone(); ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">HOME Phone</label>
                                        <input type="text" class="form-control" value="<?php echo $member->getHomePhone(); ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Emergency Number</label>
                                        <input type="text" class="form-control"
                                               value="<?php echo $member->getEmergencyNumber(); ?>" readonly>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <b>Gender</b>
                                                <div class="form-group">
                                                    <select class="form-control" disabled>
                                                        <option class="hidden" selected><?php echo $member->getGender(); ?></option>

                                                    </select>
                                                </div>
                                                <b>Marriedstatus</b>
                                                <div class="form-group">
                                                    <select class="form-control" disabled>
                                                        <option ><?php echo $member->getMarriedStatus(); ?></option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 offset-md-1">
                                                <img id="personalImage" src="/GYM/public/img/<?php echo $member->getImage(); ?>"/>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleCompanyName">Company Name</label>
                                        <input type="text" class="form-control" value="<?php echo $member->getCompanyName(); ?>" readonly>
                                    </div>

                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <b> Personal Address</b>
                                                <div class="form-group">

					<textarea rows="5" cols="30" readonly> <?php echo $member->getAddress(); ?>
					</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <b> Company Address</b>
                                                <div class="form-group">
					<textarea rows="5" cols="30" readonly><?php echo $member->getCompanyAddress();?>
					</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Birthday">Birthday </label>
                                        <input type="date" class="form-control" value="<?php echo $member->getBirthday(); ?>"readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="BranchName">Branch Name</label>
                                        <input type="text" class="form-control" value="<?php echo $branchName ;?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="AddedBy">Added By</label>
                                        <input type="text" class="form-control"
                                               value="<?php echo $member->getAddedBy(); ?>" readonly>
                                    </div>
                                </div>
                            </div>

                    </form>
                    <a href="/GYM/member/viewMemberContract/<?php echo $branch->getId()."/".$member->getId(); ?>" class="btn btn-sm btn-info viewmemberContractsbutton ">View Member Contracts</a>
            </div>
        </div>
    </div>

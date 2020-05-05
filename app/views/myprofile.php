<?php
if ($_SESSION['branch']==NULL){
    $loggedInEmployee=$gym->getOwner();
}
else
{
    $loggedInEmployee=$gym->getBranchs()[$_SESSION['branch']]->getEmployees()[$_SESSION['id']];
    $branchName=$gym->getBranchs()[$_SESSION['branch']]->getCity();
}
?>

        <section class="content">
            <div class="container-fluid">
 				<br>
                <div class="row">
                    <div class="col-md-8 offset-md-2">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="../public/img/<?php echo $loggedInEmployee->getImage(); ?>"
                                         alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center"><?php echo $loggedInEmployee->getFirstName(); ?> </h3>

                                <p class="text-muted text-center"><?php echo $loggedInEmployee->getUsertype()->getName(); ?></p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>First Name</b> <a class="float-right"><?php echo $loggedInEmployee->getFirstName(); ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Last Name</b> <a class="float-right"><?php echo $loggedInEmployee->getLastName(); ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Username</b> <a class="float-right"><?php echo $loggedInEmployee->getUserName(); ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Password</b> <a class="float-right">******</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email Address</b> <a class="float-right"><?php echo $loggedInEmployee->getEmail(); ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Gender</b> <a class="float-right"><?php echo $loggedInEmployee->getGender(); ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Type</b> <a class="float-right"><?php echo $loggedInEmployee->getUsertype()->getName(); ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Mobile Phone</b> <a class="float-right"><?php echo $loggedInEmployee->getMobilePhone(); ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Home Phone</b> <a class="float-right"><?php echo $loggedInEmployee->getHomePhone(); ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Date of Birth</b> <a class="float-right"><?php echo $loggedInEmployee->getBirthday(); ?></a>
                                    </li>
                                    <?php if ($_SESSION['branch']!=NULL){ ?>

                                    <li class="list-group-item">
                                        <b>Branch</b> <a class="float-right"><?php echo $branchName; ?></a>
                                    </li>
                                    <?php } ?>

                                </ul>
                                    <a href="#">Change Username or Password</a>
                                    <a href="#" class="float-right">Edit Profile</a>

                            </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </section>

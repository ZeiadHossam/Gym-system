<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    if (!isset($_SESSION['id']) || $_SESSION['id'] != -1) {
        echo "<script> window.location.href='login.php';</script>";
    }

    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>new owner</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../public/css/all.min.css">
    <link rel="stylesheet" href="../public/css/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/adminlte.min.css">
    <link rel="stylesheet" href="../public/css/pages/Forms.css">
    <link rel="stylesheet" href="../public/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="../public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

</head>
<body class="hold-transition register-page">
<div class="registerForm">
    <div class="register-logo">
        <b>New</b> GYM
    </div>

    <div class="card">
        <div class="card-body ">
            <p class="login-box-msg">Register a new Gym-System</p>

            <form action="../Controller/system_controller.php"
                  enctype="multipart/form-data" method="POST" onsubmit="return submitRegister()">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="input-group mb-3">
                                <input type="text" onfocusout="validate_firstname()" class="form-control"
                                       id="fname" name="fname" placeholder="*First Name">
                            </div>

                            <span class="message" id="firstName_message"></span>

                            <div class="input-group mb-3">
                                <input type="text" onfocusout="validate_lastname()" class="form-control"
                                       id="lname" name="lname" placeholder="*Last Name">
                            </div>

                            <span class="message" id="lastName_message"></span>

                            <div class="input-group mb-3">
                                <input type="text" onkeypress="return onlyNumberKey(event)"
                                       onfocusout="validate_mobilePhone()" id="mobilePhone"
                                       MAXLENGTH="11" class="form-control" name="mobilephone"
                                       placeholder="*mobile phone">

                            </div>
                            <span class="message" id="mobilePhone_message"></span>

                            <div class="input-group mb-3">
                                <input type="text" onkeypress="return onlyNumberKey(event)"
                                       onfocusout="validate_homePhone()" id="homePhone" MAXLENGTH="8"
                                       class="form-control"
                                       name="homephone"
                                       placeholder="home phone">

                            </div>
                            <span class="message" id="homePhone_message"></span>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" onkeyup="validate_email_input()"
                                       onfocusout="validate_email()" id="email" name="email" placeholder="*Email">

                            </div>
                            <span class="message" id="email_message"></span>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" onfocusout="validate_userName()" id="username"
                                       name="username" placeholder="*Username">

                            </div>
                            <span class="message" id="userName_message"></span>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" onfocusout="validate_password()"
                                       id="password"
                                       name="password" placeholder="*Password">

                            </div>
                            <span class="message" id="password_message"></span>

                            <div class="input-group mb-3">
                                <input type="text" id="birthDate" name="birthday" placeholder="  *BirthDay"
                                       onfocus="(this.type='date')"
                                       onblur="(this.type='text');validate_date()">

                            </div>
                            <span class="message" id="birthDate_message"></span>

                            <div class="mb-3">
                                <label>*Gender:</label>

                                <input type="radio" class="gender" name="gender" value="male"> <label>Male</label>

                                <input type="radio" class="gender" name="gender" value="female"> <label>Female</label>


                            </div>
                            <span class="message" id="gender_message"></span>

                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" onfocusout="validate_gymName()" id="gymName"
                                       name="gymname" placeholder="*Gym name">

                            </div>
                            <span class="message" id="gymName_message"></span>

                            <div class="input-group mb-3">

                                <input type="text" class="form-control" onfocusout="validate_branchAddress()"
                                       id="branchAddress" name="branchaddress"
                                       placeholder="*Branch address">

                            </div>
                            <span class="message" id="branchAddress_message"></span>

                            <div class="input-group mb-3">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Personal Image:</label>
                                            <input name="image" class="form-control-file" type="file"
                                                   onchange="showImage(this,'personalImage');"
                                                   id="image" accept="image/gif, image/jpeg, image/png"/>
                                            <br>
                                            <img id="personalImage" src="http://placehold.it/180"/>

                                        </div>
                                        <div class="col-6">
                                            <label>Gym logo:</label>
                                            <input name="gymimage" class="form-control-file" type="file"
                                                   onchange="showImage(this,'gymImage');"
                                                   id="gymLogo" accept="image/gif, image/jpeg, image/png"/>
                                            <br>
                                            <img id="gymImage" name="image" src="http://placehold.it/100"/>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-8">

                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" name="addowner" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>

                </div>
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
<script src="../public/plugins/jquery/jquery.min.js"></script>
<script src="../public/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../public/plugins/toastr/toastr.min.js"></script>
<script src="../public/js/pages/employeeform.js"></script>
<script src="../public/js/pages/systemform.js"></script>
<script src="../public/js/pages/branchform.js"></script>
<script src="../public/js/pages/toasters.js"></script>
<script> maximumDate();</script>
<?php
if (isset($_SESSION['messege'])) {
    echo "<script> showToasting('" . $_SESSION['messege'] . "',2);</script>";
    unset($_SESSION['messege']);
} elseif (isset($_SESSION['errormessege'])) {
    echo "<script> showToasting('" . $_SESSION['errormessege'] . "',1);</script>";
    unset($_SESSION['errormessege']);
}
?>

</body>
</html>

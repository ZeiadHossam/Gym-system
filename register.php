<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>new owner</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public/css/pages/Forms.css">
    <link rel="stylesheet" href="public/css/all.min.css">
    <link rel="stylesheet" href="public/css/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="public/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="">
    <div class="register-logo">
        <b>New</b>Owner
    </div>

    <div class="card">
        <div class="card-body ">
            <p class="login-box-msg">Register a new owner</p>

            <form action="Controller/controllingowner.php"" method="get">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">


                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="fname" placeholder="First Name" required>

                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="lname" placeholder="Last Name" required>

                </div>
                <div class="input-group mb-3">
                    <input type="number" MAXLENGTH="11" class="form-control" name="mobilephone" placeholder="mobile phone" required>

                </div>
                <div class="input-group mb-3">
                    <input type="number" MAXLENGTH="8" class="form-control" name="homephone" placeholder="home phone" required>

                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>

                </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="username" placeholder="userName" required>

                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="password" placeholder="password" required>

                            </div>

                            <div class="input-group mb-3">
                                <input  type="text"  name="birthday" placeholder="  BirthDay"
                                        onfocus="(this.type='date')"
                                        onblur="(this.type='text')">

                            </div>
                            <div class="input-group mb-3">
                                <input  type="text" name="dateadded" placeholder="  dateAdded"
                                        onfocus="(this.type='date')"
                                        onblur="(this.type='text')">

                            </div>
                            <div class="input-group mb-3">
                                <input type="radio" name="gender" value="male" required> Male
                                <input type="radio" name="gender" value="female"> Female


                            </div>
                        </div>

                        <div class="col-md-6">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="gymname" placeholder="GymName" required>

                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="branchName" required>

                </div>
                <div class="input-group mb-3">

                    <input type="text" class="form-control" placeholder="branchaddress" required>

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


</body>
</html>

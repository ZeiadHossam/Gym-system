<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>new owner</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="/public/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="public/css/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="public/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <b>New</b>Owner
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new owner</p>

      <form action="#" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="First Name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Last Name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
		  </div>
		  <div class="input-group mb-3">
          <input type="number" MAXLENGTH="11" class="form-control" placeholder="mobile phone" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
		  </div>
		    <div class="input-group mb-3">
          <input type="number" MAXLENGTH="8" class="form-control" placeholder="home phone" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
		
      
        <div class="input-group mb-3">
          <input type="date" class="form-control" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-birthday-cake"></span>
            </div>
          </div>
        </div>
		  <div class="input-group mb-3">
          <input type="radio" name="gender" value="male" required> Male
<input type="radio" name="gender" value="female"> Female

          
        </div>
		
        <div class="row">
          <div class="col-8">

          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit"  name="addowner" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="login.php" class="text-center">login</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->



</body>
</html>

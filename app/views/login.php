<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="../public/css/all.min.css">
    <link rel="stylesheet" href="../public/css/adminlte.min.css">
    <link rel="stylesheet" href="../public/css/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="../public/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="../public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link href="../public/css/login.css" rel="stylesheet">
</head>

<body>
<div class="login">
    <h1>Login</h1>
    <form method="post" action="/GYM/security/auth">
        <input type="text" name="username" placeholder="UserName" required="required"/>
        <input type="password" name="password" placeholder="Password" required="required"/>
        <button type="submit" name="login" class="btn btn-dark btn-block btn-large">Login</button>
    </form>
</div>
<script src="../public/plugins/jquery/jquery.min.js"></script>
<script src="../public/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../public/plugins/toastr/toastr.min.js"></script>
<script src="../public/js/pages/toasters.js"></script>
    <?php
    session_start();
    if (isset($_SESSION['messege'])) {

        echo "<script> showToasting('" . $_SESSION['messege'] . "',2);</script>";
        unset($_SESSION['messege']);
        session_destroy();
    }
    ?>
</body>
</html>
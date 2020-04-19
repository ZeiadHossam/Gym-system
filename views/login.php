<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link href="../public/css/login.css" rel="stylesheet">
</head>
<body>
<div class="login">
	<h1>Login</h1>
    <form method="get" action="../Controller/loginauth.php">
    	<input type="text" name="username" placeholder="UserName" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <button type="submit" name="login" class="btn btn-dark btn-block btn-large">Login</button>
    </form>
</div>
</body>
</html>
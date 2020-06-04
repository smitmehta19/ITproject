<?php
  session_start();
  include_once 'navbar.php'

?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Transparent Login Form</title>
		<link rel="stylesheet" href="stylee.css">
	</head>
	<body>
	<?php
      if (isset($_SESSION['u_id'])) {
        header("Location: index.php");
      } else {
        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        if (strpos($url, "login=error") !== false) {
          echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
                  Invalid Email / Password
                </div>';
        } elseif (strpos($url, "login=empty") !== false) {
          echo '<div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
                  Fill out all the fields!
                </div>';
		}
		echo'
		<div class="loginBox">
			<img src="user.png" class="user">
			<h2>Log In Here</h2>
			<form action="includes/login.inc.php" method="POST">
				<p>Email</p>
				<input type="email" name="email" placeholder="Enter Email">
				<p>Password</p>
				<input type="password" name="password" placeholder="******">
				<button name="submit">Log In</button>
				
			</form>';
	}
			?>
		</div>
	</body>
</html>

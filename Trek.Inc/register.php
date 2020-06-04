<?php
  session_start();
  if(isset($_SESSION['u_id'])) {
    //User is logged in
    header("Location: index.php");
    exit();
  }
  include_once 'navbar.php'
?>

		
				<?php
    //Error Handling
    // $_SERVER['HTTP_HOST'] gives http://localhost
    // $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] givees http://localhost/admissions.php?error EvWatcher
      $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      if (strpos($url, "signup=empty") !== false) {
        echo '<div class="col-md-4  col-md-offset-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
                Fill out all the fields!
              </div>';
      } elseif (strpos($url, "signup=invalid")!== false) {
        echo '<div class="col-md-4  col-md-offset-4 col-sm-4 offset-sm-4 text-center alert alert-danger lastname" role="alert">
                Invalid Characters in Name
              </div>';
      } elseif (strpos($url, "signup=email")!== false) {
        echo '<div class="col-md-4  col-md-offset-4 col-sm-4 offset-sm-4 text-center alert alert-danger lastname" role="alert">
                Invalid Email
              </div>';
      } elseif (strpos($url, "signup=taken")!== false) {
        echo '<div class="col-md-4  col-md-offset-4 col-sm-4 offset-sm-4 text-center alert alert-danger lastname" role="alert">
                User already exists
              </div>';
      } elseif (strpos($url, "signup=pass")!== false) {
        echo '<div class="col-md-4  col-md-offset-4 col-sm-4 offset-sm-4 text-center alert alert-danger lastname" role="alert">
                The passwords do not match
              </div>';
      } elseif (strpos($url, "signup=len")!== false) {
        echo '<div class="col-md-4  col-md-offset-4 col-sm-4 offset-sm-4 text-center alert alert-danger lastname" role="alert">
                Password too short (min. 8 char)
              </div>';
      } elseif (strpos($url, "signup=success")!== false) {
        // Wait for 5 seconds and then redirect user to login page
        header("refresh:2; url=login.php");
        echo '<div class="col-md-4  col-md-offset-4 col-sm-4 offset-sm-4 text-center alert alert-success">Account created, Redirecting..</div>';
      }
      //Focus on ip tag and add div container

    ?>
<br>
<br>
<br>
	<div class="registrationbox">
	<form class="col-md-offset-4" name="myForm" action="includes/register.inc.php" method="post">
	<br><label class="col-md-2">First Name</label>
	<input class="col-md-2" id="fname" type="text" name="fname" placeholder="First Name"></br>
	<br><label class="col-md-2">Last Name</label>
	<input class="col-md-2" type="text" name="lname" placeholder="Last Name"></br>
	<br><label class="col-md-2">Mobile Number</label>
	<input class="col-md-2" type="text" name="mob" placeholder="Mobile Number"></br>
	
	<br><label class="col-md-2">Email</label>
	<input class="col-md-2" type="email" name="email" placeholder="E-MAIL ID"></br>
	<br><label class="col-md-2">Password</label>
	<input class=" col-md-2" type="password" name="password" placeholder="Password"></br>
        <br><button class="col-md-offset-1 col-md-2" type="submit" name="submit">Submit</button>
</form>	
</div>
</body>
</html>

	
	
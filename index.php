<!--<?php
// If posted
if(empty($_POST) === false)
{
	// Get the posted username and save it to variable
	$username = $_POST['username'];
	// Get the posted password and save it to variable
	$password = $_POST['password'];
}
?>-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Metis Server Manager">
    <meta name="author" content="Jorge Pabon [PREngineer]">
    <link rel="icon" href="Branding/favicon.ico">

    <title>Metis Server Manager Login</title>

    <!-- Bootstrap core CSS -->
    <link href="Design/css/bootstrap.min.css" rel="stylesheet">

		<!-- Insert JavaScript -->
		<script src="Design/js/bootstrap.min.js"></script>

    <!-- Sign In CSS -->
    <link href="Design/css/sign-in.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <img src="Branding/Metis-300.png" class="logo" alt="Metis Server Manager Logo">

      <form class="form-signin">
        <h2 class="form-signin-heading">Sign In Required</h2>
				<!--<?php
				      // If the Username or Password is empty
				    	if(empty($username) === true || empty($password) === true)
				    	{
				    		// Set error message
				    		echo '--><div class="alert alert-danger" role="alert">Missing Username or Password.</div>
				              <!--';
				    	}
              // If wrong entry
				    	if(checkUsername($username) === false || checkPassword($password) === false)
				    	{
				    		// Set error message
				    		echo '--><div class="alert alert-danger" role="alert">Wrong Username or Password.</div>
				              <!--';
				    	}
				?>-->
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="username" id="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->

		<footer class="footer">
			<div class="container">
		  	<p class="text-muted">
					Metis Server Manager - Version <br>
					© 2017 - Jorge Pabón [PREngineer]
				</p>
		  </div>
		</footer>
  </body>
</html>

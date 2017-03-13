<?php

// Call the php with the Version widget
include 'Widgets/version.php';
// Call the php with the Accounts functions
include 'Functions/accounts.php';
// Call the php with the OS functions
include 'Functions/os.php';

session_start();

// If the session's loggedIn status doesn't exist, create it false
if(array_key_exists('loggedIn', $_SESSION) === false)
{
	$_SESSION['loggedIn'] = false;
}
// If session exists
else
{
	// If no session active
	if($_SESSION['loggedIn'] === false)
	{
		// Check if in index or not
		if($_SERVER["REQUEST_URI"] !== "/")
		{
			// Redirect to Index
			header('Location: /');
			exit();
		}
	}
}
?>

<?php

// Have to do this first
session_start();

// Log the user out
$_SESSION['loggedIn'] = false;

// End Session
session_destroy();

// Redirect to Campaigns
header('Location: /');
exit();

?>
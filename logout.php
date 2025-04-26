<?php
session_start(); // Start the session

// Destroy session variables to log out the user
session_unset();
session_destroy();

// Redirect to the homepage
header("Location: index.php");
exit;
?>

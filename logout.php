<?php
session_start();

// Unset specific session variables related to user login
unset($_SESSION['user_id']);
unset($_SESSION['name']);
unset($_SESSION['email'] );
// Redirect to the login page after logout
header("Location: login.php");
exit();
?>

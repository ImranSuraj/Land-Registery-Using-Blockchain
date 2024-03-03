<?php
session_start();

// Unset specific session variables related to user login
unset($_SESSION['govt_id']);
header("Location: govtlogin.php");
exit();
?>

<?php
session_start();

// Reset session values
$_SESSION['client_id'] = null;
$_SESSION['cart'] = null;
$_SESSION['signin'] = false;

// Redirect to the signin page
header("Location: ../signin.php");
exit();
?>

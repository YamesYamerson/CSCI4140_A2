<?php
require_once 'php/server_login.php'

// Prepare the update statement
$query = "UPDATE `clients771` SET `clientCompPassword771` = ? WHERE `clientId771` = ?";
$stmt = $mysqli->prepare($query);

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Bind the parameters
$stmt->bind_param("si", $hashedPassword, $clientId);

?>
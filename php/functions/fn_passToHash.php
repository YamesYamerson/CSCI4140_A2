<?php
    require_once 'php/server_login.php';

    function updatePasswordToHash($db_conn, $client_id, $password_entry){
        // Prepare the update statement
        $query = "UPDATE `clients771` SET `clientCompPassword771` = ? WHERE `clientId771` = ?";
        $stmt = $conn->prepare($query);
        // Hash the password
        $hashedPassword = password_hash($password_entry, PASSWORD_DEFAULT);
        // Bind the parameters
        $stmt->bind_param("si", $hashedPassword, $client_id);
        // Execute the update statement
        $stmt->execute();
        // Close the statement
        $stmt->close();
    }
?>
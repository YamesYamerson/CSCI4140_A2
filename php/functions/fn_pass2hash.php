<?php
    require_once 'php/server_login.php';

    function updatePasswordToHash($id, $password){
        global $mysqli;
        // Prepare the update statement
        $query = "UPDATE `clients771` SET `clientCompPassword771` = ? WHERE `clientId771` = ?";
        $stmt = $mysqli->prepare($query);
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // Bind the parameters
        $stmt->bind_param("si", $id, $hashedPassword);
        // Execute the update statement
        $stmt->execute();
        // Close the statement
        $stmt->close();
    }

    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     $clientID = $_POST["clientID"];
    //     $password = $_POST["password"];
        
    //     // Call the updatePasswordToHash function
    //     updatePasswordToHash($clientID, $password);
    // }
?>
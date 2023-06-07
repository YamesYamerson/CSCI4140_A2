<?php
    // A function to check if a form submitted username input exists in database
    // Returns error messages and updates status based on input values
    // Parameters: username_input, username_db, $status, error_message, errors[]
    // Returns: N/A

    function username_exists($username_input, $status, $error_message, $errors[]){
        $username_db = '';
        // Prepared SQL statement to search existing usernames
        $stmt = $conn -> prepare("SELECT username771 FROM clients771"); //Prepared statement to check username
        $stmt -> execute(); // Executes sql query
        $stmt -> store_result(); // Stores result in an associative array
        $stmt -> bind_result($username_db); // Binds results to parameters
        // Checks all entries until username is found, or continues
        while ($stmt -> fetch()) {
            // Compares database entries with string (includes case)
            if($username_input == $username_db){ 
                $status = 1; // Continue
                $error_message = "Username already exists, please try another one";
                $errors[] = $error_message;
                break;
            }else{
                $status = 0;
            } 
        }
    }
?>
<?php
    // A function to check if a form submitted input is not null and between 1-30 characters,
    // Returns error messages and updates status based on input values
    // Parameters: entry_input, error_message, $errors[], $status
    // Returns: N/A

    function input_check_30($entry_input, $error_message, $errors[], $status){
        if($input == null ||(strlen($username_entry > 0) && strlen($entry_input))){
           // Variables
            $error_message = ' must be between 1-30 characters';
            $errors[] = $username_error_message;
            $status = 1;
            // Switch statement for input targeting different attributes
            switch ($entry_input) {
                case $username_entry:
                    $error_message =  "Username" . $error_message; //Username error message
                    break;
                case $client_name_entry:
                    $error_message =  "Client name" . $error_message; //Client name error message
                    break;
                case "$client_city_entry":
                    $error_message =  "City name" . $error_message; //City name error message
                    break;
                case "$company_name_entry":
                    $error_message =  "Company name" . $error_message; //Company name error message
                    break;    
                default:
                    $error_message =  "Something went wrong, sorry!"; //Default error message
            }

        }else{
            $status = 0;
        }
    }
?>
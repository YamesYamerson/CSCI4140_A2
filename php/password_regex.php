<?php
function password_regex_check($password){
    //Variables
    $num_char_errors = 0;
    $password_error = "Password must contain at least one ";
    $password_error_check = "Password must contain at least one ";
    $errors = [];
    //Character conditions
    if (!preg_match("/\d/", $password)) {
        $num_char_errors ++;
        $password_error .= "digit";
    }
    if (!preg_match("/[A-Z]/", $password)) {
        if($num_char_errors > 0){
            $num_char_errors ++;
            $password_error .= ", one upper-case letter";
        }else{
            $password_error = "Password must contain at least one upper-case letter";
        }
    }
    if (!preg_match("/[a-z]/", $password)) {
        if($num_char_errors > 0){
            $num_char_errors ++;
            $password_error .= ", one lowercase letter";
        }else{
        $password_error = "Password must contain at least one lower-case letter";
        }
    }
    if (!preg_match("/\W/", $password)) {
        if($num_char_errors > 0){
            $num_char_errors ++;
            $password_error .= ", one special character";
        }else{
            $password_error = "Password must contain at least one special character";
        }
    }
    if($num_char_errors > 0){
        $password_error = substr_replace($password_error, ' and', strrpos($password_error, ','), 1);
    }
        
    if (preg_match("/\s/", $password)) {
        if($num_char_errors > 0){
            $password_error .= ", and may not contain spaces";
        }else{
            $password_error = "Password must not contain spaces";
        }
    }
    if($password_error == $password_error_check){
        $password_error = '';
    }
    return $password_error;
$password_error = '';
}
?>
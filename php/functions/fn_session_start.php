<?php
    function startSession(){
        //Starts session for cart and login
        session_start();
        $_SESSION['cart'] = [];
        //Starts Session for Login and Site Functionality and unsets session status
        if($_SESSION['signin'] == TRUE){
            $client_id = $_SESSION['client_id'];
        }
    }
?>

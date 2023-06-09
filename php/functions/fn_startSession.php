<?php
function startSession(){
    // Starts session for cart and login
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Initialize cart array only if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Starts Session for Login and Site Functionality and unsets session status
    if (isset($_SESSION['signin']) && $_SESSION['signin'] == TRUE) {
        $client_id = $_SESSION['client_id'];
    }
}

// Call the startSession() function
startSession();
?>

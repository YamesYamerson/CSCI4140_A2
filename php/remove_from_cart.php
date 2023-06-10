<?php
session_start();

if (isset($_GET['key'])) {
    $key = $_GET['key'];

    // Check if the key exists in the cart
    if (array_key_exists($key, $_SESSION['cart'])) {
        // Remove the item from the cart
        unset($_SESSION['cart'][$key]);
        $_SESSION['success_message'] = "Item removed from cart successfully.";
    } else {
        $_SESSION['error_message'] = "Invalid cart item.";
    }
} else {
    $_SESSION['error_message'] = "Invalid request.";
}

// Redirect back to the cart page
header("Location: ../cart.php");
exit();
?>

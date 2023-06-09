<?php
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $partNo = trim($_GET['partno']);
        $quantity = $_POST['quantity'];

        // Add the item and quantity to the cart
        $_SESSION['cart'][$partNo] = $quantity;

        // Redirect back to the previous page
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }

?>

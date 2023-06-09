<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    $partNo = trim($_GET['partno']);
    $quantity = $_POST['quantity'];
    echo $partNo . "<br>" . $quantity;

    // Check if the part number already exists in the cart
    $existingItemIndex = -1;
    foreach ($_SESSION['cart'] as $index => $item) {
        if ($item['partno'] == $partNo) {
            $existingItemIndex = $index;
            break;
        }
    }

    if ($existingItemIndex !== -1) {
        // Update the quantity of the existing item
        $_SESSION['cart'][$existingItemIndex]['quantity'] += $quantity;
    } else {
        // Add the item and quantity to the cart
        $cart_item = array("partno" => $partNo, "quantity" => $quantity);
        $_SESSION['cart'][] = $cart_item;
    }

    // Redirect back to the previous page
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

?>

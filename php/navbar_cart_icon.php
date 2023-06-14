<?php
  // Initialize cart count to 0 if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Get the cart count from the session
$cartCount = count($_SESSION['cart']);

$cart_button = <<<CARTBUTTON
    <form class="d-flex">
        <a class="btn btn-outline-dark" href="cart.php">
            <i class="bi-cart-fill me-1"></i>
            Cart
            <span class="badge bg-dark text-white ms-1 rounded-pill">$cartCount</span>
        </a>
    </form>
CARTBUTTON;

echo $cart_button;
?>
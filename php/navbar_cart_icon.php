<?php
    // Starts session
    session_start();

    // Get the cart count from the session
    $cartCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
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
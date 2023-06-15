<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" width="30" height="30" alt="">
        </a>
        <a class="navbar-brand" href="index.php">Parts 'R' Us</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 flex-row">
                <li class="nav-item mx-2"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                <li class="nav-item mx-2"><a class="nav-link" href="index_list.php">List Parts</a></li>
                <li class="nav-item mx-2"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item mx-2"><a class="nav-link" href="purchase_orders.php">Orders</a></li>
            </ul>
            <?php include "php/login_create_account_button.php"; ?>
            <?php include "php/navbar_cart_icon.php"; ?>
        </div>
    </div>
</nav>

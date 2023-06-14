<?php
    //Starts session
    session_start();
    if (!isset($_SESSION["signin"]) || $_SESSION["signin"] !== true) {
        $_SESSION["signin"] = false;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>4140 Assn2 Parts Ordering</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <?php include 'php/navbar.php'; ?>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-2">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Need Parts?</h1>
                    <p class="lead fw-normal text-white-50 mb-0">We've got parts for pretty much everything, if it has a part, we've got it</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-1">
            <!--Search Box-->
        <?php require_once 'php/search_box.php' ?>
            <div class="container px-4 px-lg-5 mt-3 mb-1">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php include 'php/parts_cards.php'; ?>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <?php include 'php/footer.php'; ?>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

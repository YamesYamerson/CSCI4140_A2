<?php
    //Starts session
    require_once 'php/functions/fn_startSession.php';
    startSession();
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
        <header class="bg-dark py-2">
            <div class="container px-4 px-lg-5 my-1">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">About Us</h1>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-1">
            <div class="container px-4 px-lg-5 my-5">
               <p>We provide only the highest quality parts. We love parts so much, that they're the only thing that we stock! If it's not in pieces, we don't want it! We have a long history of finding the highest quality parts from the most mundane to the interesting and exotic. Just take a look at our list of parts and we're sure that you'll see how great they are!</p>
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

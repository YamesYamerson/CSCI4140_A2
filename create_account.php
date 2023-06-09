<?php
    //Starts session
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description = Create Account Page for Parts Website" content />
        <meta name="author = James McLean" content />
        <title>Parts 'R' Us</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="img/favicon.ico"/>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <!-- Adapted from modern business contact.html page-->
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
           <!-- Navigation - Links and titles changed from bootstrap-->
           <?php require_once "php/navbar.php" ?>
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <?php 
                        include 'php/create_account_regex_form.php';
                    ?>   
                </div>
            </section>
        </main>
        <!-- Footer-->
        <?php require_once "php/footer.php" ?>
    </body>
</html>

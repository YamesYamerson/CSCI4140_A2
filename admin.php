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
        <header class="bg-dark py-1">
            <div class="container px-4 px-lg-5 my-2">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">ADMIN PAGE</h1>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-2">
            <div class="container px-4 px-lg-5 my-4">
            <h3>ADMIN FUNCTIONS:</h3>
<ul>
    <li><a href="php/functions/fn_passToHash.php">pass2hash()</a></li>
    <li><a href="php/functions/fn_updateClient.php">updateClient()</a></li>
    <li><a href="php/functions/fn_updateLine.php">updateLine()</a></li>
    <li><a href="php/functions/fn_updatePO.php">updatePO()</a></li>
    <li><a href="php/functions/fn_updatePart.php">updatePart()</a></li>
</ul>

<h3>pass2hash()</h3>
<?php include "php/pass2hash_form.php"; ?>
<h3 class="mt-5">update_client()</h3>
<?php include "php/update_client.php"; ?>


<?php 
    $clientID = $_POST['client_id_entry'];
    $password = $_POST['password_entry'];
    if (!empty($_POST['client_id_entry']) && !empty($_POST['password_entry']) && isset($_POST['submit'])) {
        require_once 'php/functions/fn_passToHash.php'; 
        updatePasswordToHash($conn, $client_id_entry, $password_entry);
        // Display a warning message and confirmation prompt
    }
?>

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

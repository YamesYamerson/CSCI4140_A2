<?php
    //Starts session
    require_once 'php/functions/fn_session_start.php';
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
    <li><a href="php/functions/fn_pass2hash.php">pass2hash()</a></li>
    <li><a href="php/functions/fn_updateClient.php">updateClient()</a></li>
    <li><a href="php/functions/fn_updateLine.php">updateLine()</a></li>
    <li><a href="php/functions/fn_updatePO.php">updatePO()</a></li>
    <li><a href="php/functions/fn_updatePart.php">updatePart()</a></li>
</ul>

<h3>pass2hash()</h3>

<!-- HTML Form with an input box for client ID and password -->
<form class="container row g-3 mt-4 align-items-end" method="POST" action="">
    <div class="col-5">
        <label for="clientID" class="form-label">Client ID:</label>
        <input type="text" class="form-control" name="clientID" id="clientID">
    </div>
    <div class="col-5">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="col-2 d-grid">
        <button type="submit" class="btn btn-primary mt-auto">Hash Password</button>
    </div>
</form>

<?php 
    require_once 'php/functions/fn_pass2hash.php'; 
    if (isset($_POST['clientID']) && isset($_POST['password'])) {
        $clientID = $_POST['clientID'];
        $password = $_POST['password'];
        // Display a warning message and confirmation prompt
        echo "<p>Please ensure both Client ID and Password are provided.</p>";
        echo "<div id='pass2hash-component' style='display: none;'>
                <?php updatePasswordToHash($clientID, $password); ?>
            </div>";
        echo "<script>
            function showConfirmation(event) {
                event.preventDefault(); // Prevent the form from submitting directly
                if (confirm('Are you sure you want to hash the password?')) {
                    document.getElementById('pass2hash-component').innerHTML = '<?php updatePasswordToHash($clientID, $password); ?>';
                    event.target.form.submit(); // Submit the form if user confirms
                }
            }
        </script>";
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

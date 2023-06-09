

<?php 
    // Starts session
    session_start();
    /// Initialize PHP variables to store form data
    $username='';
    $password='';
    $client_id='';
    $client_name='';
    // Variable for error message
    $error = '';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Art By You</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <!-- Adapted from modern business contact.html page-->
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation -->
            <!-- PHP statement to include navigation bar -->
            <?php include "php/navbar.php"; ?>
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Sign-in Form -->
                    <?php include 'php/signin_form.php'; ?>
                    <!-- Sign-up Form -->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                            <div class="row gx-5 justify-content-center">
                                <div class="col-lg-8 col-xl-6 mb-2">
                                    <form method="post" action="createAccout.php">
                                        <div class="text-center mb-3">
                                            <h4 class="fw-bolder">Not Currently a Member? Sign-Up!</h4>
                                        </div>
                                        <div class="row gx-5 justify-content-center mb-2">
                                            <a href = "create_account.php">
                                            <div class="d-grid"><input name ="Signup" type ="Signup" class="btn btn-secondary btn-lg" value="Signup"></div>  
                                            </a>
                                        </div>                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </main>
        <!-- Footer-->
        <?php require_once "php/footer_card.php" ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>

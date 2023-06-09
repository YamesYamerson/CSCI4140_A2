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
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Cart</h1>
                    <p class="lead fw-normal text-white-50 mb-0">We've got parts for pretty much everything, if it has a part, we've got it</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                <?php
                    $product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
                    if (!empty($product_array)) { 
                        foreach($product_array as $key=>$value){
                        ?>
                            <div class="product-item">
                                <form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                                <div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
                                <div class="product-tile-footer">
                                <div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
                                <div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
                                <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
                                </div>
                                </form>
                            </div>
                        <?php
                        }
                    }
                ?>
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

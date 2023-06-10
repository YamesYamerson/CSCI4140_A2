<?php
// Connects to MySQL database and accesses 'artbyyou'
include 'php/server_login.php';

// General Variables
$this_part_no = trim($_GET['partno']);
// Prepared statement to get artist data
$stmt = $conn->prepare("SELECT partNo771, partName771, partDescription771, currentPrice771, quantityOnHand771, partImage771 FROM parts771 WHERE partNo771 = ?");
mysqli_stmt_bind_param($stmt, "s", $this_part_no);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($partNo771, $partName771, $partDescription771, $currentPrice771, $quantityOnHand771, $partImage771);
$stmt->fetch();
$stmt->close(); // Close statement
$conn->close(); // Close connection
?>

<!-- About section one -->
<section class="py-5 bg-light" id="scroll-target">
    <div class="container px-5 my-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-4 bg-secondary py-1 px-1 rounded">
                <img class="img-fluid rounded mb-5 mb-lg-0" src="img/<?php echo $partImage771; ?>" alt="..." />
            </div>
            <div class="col-lg-8">
                <h2><strong>Part #<?php echo $partNo771; ?></strong> - <?php echo $partName771; ?></h2>
                <h4><strong>Price:</strong> <?php echo $currentPrice771; ?></h4>
                <p class="lead fw-normal text-muted mb-0"><strong>Description:</strong><br><?php echo $partDescription771; ?></p>

                <form action="php/add_to_cart.php?partno=<?php echo $this_part_no; ?>" method="post">
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" max="<?php echo $quantityOnHand771; ?>">
                        </div>
                        <div class="col-md-6 align-self-end d-flex justify-content-between">
                            <button class="btn btn-primary me-2" type="submit">
                                <i class="bi bi-cart-plus me-2"></i> Add to Cart
                            </button>
                            <a href="cart.php" class="btn btn-primary">
                                <i class="bi bi-cart me-2"></i> View Cart
                            </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>


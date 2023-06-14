<?php
// Starts session
session_start();

// Include database connection and configuration
include 'php/server_login.php';


// Check if client_id is set in the session
if (!isset($_SESSION['client_id'])) {
    $client_id = null;
} else {
    $client_id = $_SESSION['client_id'];
}


// Retrieve purchase orders for the current customer
$stmt = $conn->prepare("SELECT purchaseorders771.poNo771, purchaseorders771.datePO771, purchaseorders771.status771 FROM purchaseorders771 WHERE clientId771 = ?");
$stmt->bind_param("s", $client_id);
$stmt->execute();
$result = $stmt->get_result();

// Store the purchase orders in an array
$purchaseOrders = array();
while ($row = $result->fetch_assoc()) {
    $purchaseOrders[] = $row;
}
$stmt->close();
$conn->close();
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
        <div class="container px-4 px-lg-5 my-2">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Purchase Orders</h1>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-1">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <!-- Output Div for Purchase Orders -->
                <div class="col-lg-8">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Purchase Order Number</th>
                                    <th>Date PO</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($purchaseOrders) > 0) {
                                    foreach ($purchaseOrders as $purchaseOrder) {
                                        $poNo = $purchaseOrder['poNo771'];
                                        $datePO = $purchaseOrder['datePO771'];
                                        $status = $purchaseOrder['status771'];

                                        echo "<tr>";
                                        echo "<td>$poNo</td>";
                                        echo "<td>$datePO</td>";
                                        echo "<td>$status</td>";
                                        echo "<td><a href='purchase_order_line.php?poNo=$poNo' class='btn btn-primary' value='poNo'>View PO Lines</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>No purchase orders found for the current customer.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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

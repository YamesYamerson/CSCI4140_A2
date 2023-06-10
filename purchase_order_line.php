<?php
// Starts session
session_start();

// Include database connection and configuration
include 'php/server_login.php';

// Retrieve the purchase order number from the query parameter
$poNo = $_GET['poNo'];

// Retrieve purchase order lines for the given purchase order number
$stmt = $conn->prepare("SELECT lines771.lineNo771, lines771.lineId771, parts771.partNo771, parts771.partName771, parts771.partDescription771, parts771.currentPrice771, lines771.quantity771,
                        parts771.currentPrice771 * lines771.quantity771 AS lineTotal
                        FROM lines771 
                        JOIN parts771 ON lines771.partNo771 = parts771.partNo771
                        WHERE lines771.poNo771 = ?
                        GROUP BY lines771.lineNo771, lines771.lineId771, parts771.partNo771, parts771.partName771, parts771.partDescription771, parts771.currentPrice771, lines771.quantity771
                        ORDER BY lines771.lineNo771 ASC");

$stmt->bind_param("s", $poNo);
$stmt->execute();
$result = $stmt->get_result();
$totalCost = 0; // Variable to hold the total cost

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>4140 Assn2 Parts Ordering - Purchase Order Details</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation-->
    <?php include 'php/navbar.php'; ?>
    <!-- Header-->
    <header class="bg-dark py-2">
        <div class="container px-4 px-lg-5 my-2">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">PO Lines</h1>
                <p class="lead text-white-50">Client Number: <?php echo ($_SESSION['client_id']); ?></p>
                <p class="lead text-white-50">Purchase Order Number: <?php echo ($poNo); ?></p>

            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-1">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <!-- Output Div for Purchase Order Lines -->
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Line ID</th>
                                    <th>Line Number</th>
                                    <th>Part Number</th>
                                    <th>Part Name</th>
                                    <th>Part Description</th>
                                    <th>Quantity</th>
                                    <th>Current Price</th>
                                    <th>Line Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $lineNo = $row['lineNo771'];
                                        $lineId = $row['lineId771'];
                                        $partNo = $row['partNo771'];
                                        $partName = $row['partName771'];
                                        $partDescription = $row['partDescription771'];
                                        $quantity = $row['quantity771'];
                                        $currentPrice = $row['currentPrice771'];
                                        $lineSubtotal = $row['lineTotal'];

                                        echo "<tr>";
                                        echo "<td>" . ($lineId) . "</td>";
                                        echo "<td>" . ($lineNo) . "</td>";
                                        echo "<td>" . ($partNo) . "</td>";
                                        echo "<td>" . ($partName) . "</td>";
                                        echo "<td>" . ($partDescription) . "</td>";
                                        echo "<td>" . ($quantity) . "</td>";
                                        echo "<td>" . number_format((float)$currentPrice, 2, '.', '') . "</td>";
                                        echo "<td>" . number_format((float)$lineSubtotal, 2, '.', '') . "</td>";
                                        echo "</tr>";

                                        // Add line subtotal to the total cost
                                        $totalCost += $lineSubtotal;
                                    }

                                    // Display the total cost
                                    echo "<tr>";
                                    echo "<td colspan='7' align='right'><strong>Total Cost:</strong></td>";
                                    echo "<td>" . number_format((float)$totalCost, 2, '.', '') . "</td>";
                                    echo "</tr>";
                                    // Add your logic to display the status based on the total cost
                                    // Example logic: if ($totalCost > 1000) echo "Approved"; else echo "Pending";
                                    echo "</td>";
                                    echo "</tr>";
                                } else {
                                    echo "<tr><td colspan='8'>No purchase order lines found for the selected purchase order.</td></tr>";
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
</body>
</html>

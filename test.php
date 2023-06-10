// Retrieve the purchase order number from the query parameter
$poNo = $_GET['poNo'];

// Debugging: Output the value of $poNo to check if it's being retrieved correctly
echo "Purchase Order Number: " . ($poNo) . "<br>";

// Retrieve purchase order lines for the given purchase order number
$stmt = $conn->prepare("SELECT lines771.poNo771, lines771.partNo771, lines771.quantity771, lines771.lineId771, lines771.lineNo771 FROM lines771 WHERE poNo771 = ?");
$stmt->bind_param("s", $poNo);
$stmt->execute();
$result = $stmt->get_result();

// Store the purchase order lines in an array
$purchaseOrderLines = array();
while ($row = $result->fetch_assoc()) {
    $purchaseOrderLines[] = array(
        'poNo' => $row['poNo771'],
        'lineId' => $row['lineId771'],
        'lineNo' => $row['lineNo771'],
        'partNo' => $row['partNo771'],
        'quantity' => $row['quantity771']
    );
}

// Output the purchase order lines
if (count($purchaseOrderLines) > 0) {
    foreach ($purchaseOrderLines as $purchaseOrderLine) {
        $lineId = $purchaseOrderLine['lineId'];
        $lineNo = $purchaseOrderLine['lineNo'];
        $partNo = $purchaseOrderLine['partNo'];
        $quantity = $purchaseOrderLine['quantity'];

        echo "Line ID: " . ($lineId) . "<br>";
        echo "Line Number: " . ($lineNo) . "<br>";
        echo "Part Number: " . ($partNo) . "<br>";
        echo "Quantity: " . ($quantity) . "<br>";
        echo "<br>";
    }
} else {
    echo "No purchase order lines found for the selected purchase order.";
}

<?php
include 'php/server_login.php';

echo <<<HTML
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Part #</th>
                    <th>Part Name</th>
                    <th>Description</th>
                    <th>Current Price ($)</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
HTML;

$stmt = $conn->prepare("SELECT partNo771, partName771, partDescription771, currentPrice771 FROM parts771");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($partNo771, $partName771, $partDescription771, $currentPrice771);

while ($stmt->fetch()) {
    echo <<<HTML
    <tr>
        <td>$partNo771</td>
        <td>$partName771</td>
        <td>$partDescription771</td>
        <td>$currentPrice771</td>
        <td><button class="btn btn-primary btn-sm"><i class="bi bi-cart-plus"></i></button></td>
    </tr>
HTML;
}

$stmt->close();
$conn->close();

echo <<<HTML
            </tbody>
        </table>
    </div>
</div>
HTML;
?>

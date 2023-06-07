<?php
//Server login file for phpmyadmin
include 'php/server_login.php';

if (isset($_GET['search'])) {
    $searchValue = $_GET['search'];

    $stmt = $conn->prepare("SELECT partNo771, partName771, partDescription771, currentPrice771 FROM parts771 WHERE partNo771 = ?");
    $stmt->bind_param("s", $searchValue);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo <<<HTML
        <div class="container my-4">
            <h2>Search Results</h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Part Number</th>
                            <th>Part Name</th>
                            <th>Part Description</th>
                            <th>Current Price</th>
                        </tr>
                    </thead>
                    <tbody>
        HTML;

        while ($row = $result->fetch_assoc()) {
            $partNo771 = $row['partNo771'];
            $partName771 = $row['partName771'];
            $partDescription771 = $row['partDescription771'];
            $currentPrice771 = $row['currentPrice771'];

            echo <<<HTML
            <tr>
                <td>$partNo771</td>
                <td>$partName771</td>
                <td>$partDescription771</td>
                <td>$currentPrice771</td>
            </tr>
        HTML;
        }

        echo <<<HTML
                    </tbody>
                </table>
            </div>
        </div>
        HTML;
    } else {
        echo "<p>No results found.</p>";
    }

    $stmt->close();
} else {
    echo "<p>No search query specified.</p>";
}

$conn->close();
?>

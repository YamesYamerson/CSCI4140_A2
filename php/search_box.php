<?php
include 'php/server_login.php';

if (isset($_GET['search'])) {
    $searchValue = $_GET['search'];

    $stmt = $conn->prepare("SELECT partNo771, partName771, partDescription771, currentPrice771 FROM parts771 WHERE partId771 = ?");
    $stmt->bind_param("i", $searchValue);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($partNo771, $partName771, $partDescription771, $currentPrice771);

    if ($stmt->num_rows > 0) {
        echo <<<HTML
        <div class="container">
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

        while ($stmt->fetch()) {
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
    echo <<<HTML
<div class="container mt-3 mb-4">
    <form method="GET" action="" class="d-flex justify-content-center">
        <div class="form-floating my-2" style="width: 50%;">
            <input type="text" class="form-control" id="floatingSearch" name="search" placeholder="Search by Part ID" required>
            <label for="floatingSearch">Search by Part ID</label>
        </div>
        <button type="submit" class="btn btn-primary my-2">Search</button>
    </form>
</div>

HTML;
}

$conn->close();
?>

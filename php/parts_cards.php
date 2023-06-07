<?php 
    include 'php/server_login.php';
    //Creates prepared statement to get data from parts table
    $stmt = $conn->prepare("SELECT partNo771, partName771, partDescription771, currentPrice771, partImage771 FROM parts771");
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($partNo771, $partName771, $partDescription771, $currentPrice771, $partImage771);
    //Loop to populate parts cards on page
    while ($stmt->fetch()) {
        // Heredoc to insert database values into parts cards
        $thiscard = <<<PARTSCARD
        <div class="col mb-5">
            <div class="card h-100">
                <!-- Product image-->
                <div class="mx-2 my-2 text-center">
                    <img class="card-img-top img-fluid" style="max-height: 200px; width: auto;" src="img/$partImage771" alt="...">
                </div>
                <!-- Product details-->
                <div class="card-body">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder">$partName771</h5>
                        <!-- Product price-->
                        <p class="fw-bold">Price: $currentPrice771</p>
                        <p>$partDescription771</p>
                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center">
                        <a href="partinfo.php?partno=$partNo771">
                            <button type="button" class="btn btn-primary mt-auto">More Info</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        PARTSCARD;
        echo $thiscard; //outputs parts card
    }
    $stmt->close(); //close statement
    $conn->close(); //close connection

    
?>

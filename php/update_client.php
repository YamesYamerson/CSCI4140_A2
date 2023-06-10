<?php
// Define variables for form values
$client_id_entry = "";
$client_name_entry = "";
$client_city_entry = "";
$company_name_entry = "";
$password_entry = "";
$dollars_on_order_entry = "";
$client_status_entry = "";
$money_owed_entry = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form has been submitted

    // Get the form input values
    $client_id_entry = $_POST["clientID"];
    $client_name_entry = $_POST["clientName"];
    $client_city_entry = $_POST["clientCity"];
    $company_name_entry = $_POST["companyName"];
    $password_entry = $_POST["password"];
    $dollars_on_order_entry = $_POST["dollarsOnOrder"];
    $client_status_entry = $_POST["clientStatus"];
    $money_owed_entry = $_POST["moneyOwed"];

    // Validate the form inputs
    if (empty($client_id_entry) || empty($client_name_entry) || empty($client_city_entry) || empty($company_name_entry) || empty($password_entry) || empty($dollars_on_order_entry) || empty($client_status_entry) || empty($money_owed_entry)) {
        $error_message = "Please fill in all the fields.";
    } else {
        // Process the form data
        // ...

        // Reset the form values
        $client_id_entry = "";
        $client_name_entry = "";
        $client_city_entry = "";
        $company_name_entry = "";
        $password_entry = "";
        $dollars_on_order_entry = "";
        $client_status_entry = "";
        $money_owed_entry = "";
    }
}

$form = <<<FORM
<!-- HTML Form with input fields for client771 -->
<form class="container row g-3 mt-4 align-items-end" method="POST" action="">
    <div class="col-5">
        <div class="form-floating">
            <input type="text" class="form-control" name="clientID" id="clientID" value="$client_id_entry" required>
            <label for="clientID">Client ID</label>
        </div>
    </div>
    <div class="col-5">
        <div class="form-floating">
            <input type="text" class="form-control" name="clientName" id="clientName" value="$client_name_entry" required>
            <label for="clientName">Client Name</label>
        </div>
    </div>
    <div class="col-5">
        <div class="form-floating">
            <input type="text" class="form-control" name="clientCity" id="clientCity" value="$client_city_entry" required>
            <label for="clientCity">Client City</label>
        </div>
    </div>
    <div class="col-5">
        <div class="form-floating">
            <input type="text" class="form-control" name="companyName" id="companyName" value="$company_name_entry" required>
            <label for="companyName">Company Name</label>
        </div>
    </div>
    <div class="col-5">
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="password" value="$password_entry" required>
            <label for="password">Password</label>
        </div>
    </div>
    <div class="col-5">
        <div class="form-floating">
            <input type="text" class="form-control" name="dollarsOnOrder" id="dollarsOnOrder" value="$dollars_on_order_entry" required>
            <label for="dollarsOnOrder">Dollars on Order</label>
        </div>
    </div>
    <div class="col-5">
        <div class="form-floating">
            <input type="text" class="form-control" name="clientStatus" id="clientStatus" value="$client_status_entry" required>
            <label for="clientStatus">Client Status</label>
        </div>
    </div>
    <div class="col-5">
        <div class="form-floating">
            <input type="text" class="form-control" name="moneyOwed" id="moneyOwed" value="$money_owed_entry" required>
            <label for="moneyOwed">Money Owed</label>
        </div>
    </div>
    <div class="col-2 d-grid">
        <button type="submit" name="submit" class="btn btn-primary mt-auto" value="Submit">Submit</button>
    </div>
</form>

FORM;

echo $form;

if (!empty($error_message)) {
    echo "<p class='error'>$error_message</p>";
}
?>

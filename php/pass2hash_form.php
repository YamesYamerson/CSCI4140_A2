<?php
require_once 'php/server_login.php';

// Define variables for form values and error messages
$client_id_entry = "";
$password_entry = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form has been submitted

    // Get the form input values
    $client_id_entry = $_POST["clientID"];
    $password_entry = $_POST["password"];

    // Validate the form inputs
    if (empty($client_id_entry) || empty($password_entry)) {
        $error_message = "Please enter both the client ID and password.";
    } else {
        // Prepare the update statement
        $query = "UPDATE `clients771` SET `clientCompPassword771` = ? WHERE `clientId771` = ?";
        $stmt = $conn->prepare($query);

        // Hash the password
        $hashedPassword = password_hash($password_entry, PASSWORD_DEFAULT);

        // Bind the parameters
        $stmt->bind_param("si", $hashedPassword, $client_id_entry);

        // Execute the update statement
        if ($stmt->execute()) {
            $success_message = "Password hashed and updated successfully.";
        } else {
            $error_message = "Error occurred while updating the password.";
        }

        // Close the statement
        $stmt->close();
    }
}

$pass2hash_form = <<<FORM
<!-- HTML Form with an input box for client ID and password -->
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
            <input type="password" class="form-control" name="password" id="password" value="$password_entry" required>
            <label for="password">Password</label>
        </div>
    </div>
    <div class="col-2 d-grid">
        <button type="submit" name="submit" class="btn btn-primary mt-auto" value="Hash Password">Hash Password</button>
    </div>
</form>

FORM;

echo $pass2hash_form;

if (!empty($error_message)) {
    echo "<p class='error'>$error_message</p>";
}

if (!empty($success_message)) {
    echo "<p class='success'>$success_message</p>";
}
?>

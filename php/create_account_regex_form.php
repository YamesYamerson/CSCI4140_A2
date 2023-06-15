<?php
//Accesses MAMP server an MySql server and accesses 
include 'php/server_login.php';
// Variables
// Error Messages
$username_error_message = '';
$password_error_message = '';
$password_error_message2 = '';
$name_error_message = '';
$company_name_error_message = '';
$city_error_message = '';
$errors = []; // Array that collects error messages based on user input
// Status variables
$status = 1; // TRUE for continue, FALSE for exit, quits by default unless name exists in database
$username_status = FALSE;
$pass_len_check = FALSE;
// Form submitted variables with whitespace removed (except password)
$username_entry = trim($_POST["Username"]);
$client_name_entry = trim($_POST["ClientName"]); // Creates variable for name entry and trims whitespace
$client_city_entry = trim($_POST["ClientCity"]); // Creates variable for artisttype and trims whitespace
$company_name_entry = trim($_POST["CompanyName"]); // Creates variable for artisttype and trims whitespace
$company_password_entry = $_POST["CompanyPassword"]; // Creates variable for aboutartist and trims whitespace
$company_password_entry2 = $_POST["CompanyPassword2"];

// Prepared SQL statement to search existing usernames
$stmt = $conn -> prepare("SELECT username771 FROM clients771"); //Prepared statement to check username
$stmt -> execute(); // Executes sql query
$stmt -> store_result(); // Stores result in an associative array
$stmt -> bind_result($username771); // Binds results to parameters

// Checks all entries until username is found, or continues
while ($stmt -> fetch()) {
   // Compares database entries with string (includes case)
   if($username_entry == $username771){ 
    $status = 1; // Continue
    $username_status = FALSE; // Continue
    $username_error_message = "Username already exists, please try another one";
    $errors[] = $username_error_message;
    break;
    }else{
        $username_status = TRUE; //Name can be used in database
        $status = 0;
    } 
}
if($username_entry == null ||(strlen($username_entry < 1) && strlen($username_entry) < 30)){
    $username_error_message = 'Username must be between 1-30 characters';
    $errors[] = $username_error_message;
}else{
    $status = 0;
}
//Checks to see if client name is valid, else returns an error and sets status to 1
if($client_name_entry != null || (strlen($_clientname_entry) < 20 && strlen($client_name_entry) > 0)){
    $status = 0;
}else{
    $status = 1;
    $name_error_message = "Name must be between 1-30 characters";
        $errors[] = $name_error_message;
}
//Checks image filename for null and boundary cases
if($client_city_entry != null || (strlen($client_city_entry) > 0 && strlen($client_city_entry) < 31)){
       $status = 0;
}else{
    $status = 1;
    $city_error_message = "City name must be between 1-30 characters!";
        $errors[] = $city_error_message;
}
//Checks image filename for null and boundary cases
if(strlen($company_name_entry) > 0 && strlen($company_name_entry) < 31){
    $status == 0;
}else{
    $status = 1;
    $company_name_error_message = "Company name must be between 1-30 characters";
    $errors[] = $company_name_error_message;

}
//Includes php file for verifying password entry and providing error feedback
include "php/password_regex.php";
//Verifies password has necessary characters with regex
$pass_ver = password_regex_check($company_password_entry);
if((strlen($company_password_entry) > 30) || (strlen($company_password_entry) < 7)){
    $password_error_message = "Password must be 7-30 characters";
    $errors[] = $password_error_message;
    $pass_len_check = TRUE;
    $status = 1;
}else{
    $status = 0;
}
if(($pass_ver != '' &&  $status == 0)){
    $status = 1;
    $password_error_message = $pass_ver;
    $errors[] = $password_error_message;
}
if($status == 0){
    if($company_password_entry == $company_password_entry2){
        $match = TRUE;
    }else{
        $password_error_message2 = "Passwords have to match";
    }
}
//Checks to see if there are values in the errors array and Submit has been clicked
if (isset($_POST["Submit"])) {
    //Checks to see if the password matches all regex requirements
    if($match == TRUE){
        //Hashes password entry and saves it as a variable
        $hashed_password = password_hash($company_password_entry, PASSWORD_BCRYPT);
        $status = 0;
    }else{
        $status = 1;
    }
}
    



    if($status == 0){
        // Prepare the statements for inserting data into the artists and signin tables
        $stmt = mysqli_prepare($conn, "INSERT INTO clients771 (username771, clientName771, clientCity771, companyName771, clientCompPassword771) VALUES (?,?,?,?,?)");
        // Bind the variables to the prepared statements
        mysqli_stmt_bind_param($stmt, "sssss", $username_entry, $client_name_entry, $client_city_entry, $company_name_entry, $hashed_password);
        // Execute the prepared statements and check if the data was inserted successfully
        if (mysqli_stmt_execute($stmt)) {
        $message2 = "Data inserted into the signin table successfully.";
        } else {
        $message2 = "Error inserting data into the signin table: " . mysqli_stmt_error($stmt);
        }
        $temp_client_id = mysqli_insert_id($conn); 

        // Close the statements and the database connection
        mysqli_stmt_close($stmt);
        $_SESSION["signin"]=TRUE;
        $_SESSION["client_id"]=$temp_client_id;
        header('Location: index.php');
    }
    //Clears errors if pages is refreshed
    if(!isset($_POST["Submit"] )){
        unset($username_error_message, $name_error_message, $username_error_message, $city_error_message, $company_name_error_message, $password_error_message);
    }
//Sign-up card
$createAccout_card = <<<SIGNUPCARD
<!-- Post form-->
    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
  
            <h1 class="fw-bolder text-center">Create New Account</h1>
     
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <form method="post">
                    <div class="ms-2">
                        <p class="text-danger my-0">$username_error_message</p>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" name="Username" id="floatingName" placeholder="Enter Name" class="form-control" value="$username_entry" />
                        <label for="floatingName">Enter Username</label>
                    </div>
                    <div class="ms-2">
                        <p class="text-danger my-0">$name_error_message</p>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" name="ClientName" id="floatingName" placeholder="Enter Name" class="form-control" value="$client_name_entry" />
                        <label for="floatingName">Enter Client Name</label>
                    </div>
                    <div class="ms-2">
                        <p class="text-danger my-0">$city_error_message</p>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" name="ClientCity" id="floatingArtistImage"  placeholder="Upload An Image of Yourself" class="form-control" value="$client_city_entry" />
                        <label for="floatingArtistImage">Enter Client City</label>
                    </div>
                    <div class="ms-2">
                        <p class="text-danger my-0">$company_name_error_message</p>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" name="CompanyName" id="floatingName" placeholder="Enter Name" class="form-control" value="$company_name_entry" />
                        <label for="floatingName">Enter Company Name</label>
                    </div>
                    <div class="ms-2">
                        <p class="text-danger my-0">$password_error_message</p>
                    </div>
                    <div class="form-floating mb-2">
                            <input type="password" name="CompanyPassword" id ="floatingPassword" class="form-control" placeholder="Enter Password" value="$company_password_entry" />
                            <label for="floatingPassword">Enter Company Password</label>
                    </div>
                    <div class="ms-2">
                        <p class="text-danger my-0">$password_error_message2</p>
                    </div>
                    <div class="form-floating mb-2">
                            <input type="password" name="CompanyPassword2" id ="floatingPassword" class="form-control" placeholder="Enter Password" value="$company_password_entry2" />
                            <label for="floatingPassword">Re-Enter Company Password</label>
                    </div>
                    <div class="d-grid"><input name = "Submit" type ="Submit" class="btn btn-primary btn-lg" value="Submit" /></div>                           
                </form>
            </div>
        </div>
    </div>
SIGNUPCARD;
//Displays signin form
echo $createAccout_card;
// if(!isset($_POST["Submit"] )){
//     unset($username_error_message, $name_error_message, $username_error_message, $city_error_message, $company_name_error_message, $password_error_message, $password_error_message2);
//  }
?>

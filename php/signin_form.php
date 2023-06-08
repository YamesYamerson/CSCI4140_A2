<?php 
    //Accesses MAMP server an MySql server and accesses 
    require_once 'php/server_login.php';
    // Variables
    $status = 1; // 0 for continue, 1 for exit, quits by default unless name exists in database
    $username_status = 1; // 0 for found, 1 for not found - not found by default
    // Form submitted variables with whitespace removed
    $client_id_entry = trim($_POST["ClientId"]);
    $password_entry = trim($_POST["Password"]); //gets password form post and cleans whitespace
    // Form submitted variable string lengths
    $client_id_length = strlen($client_id_entry); //gets string length of name from form submit
    $password_length = strlen($password_entry); //gets string length of title from form submit
    // //Creates prepared statement to get data from artists table
    $stmt = $conn -> prepare("SELECT clientId771, clientName771, clientCompPassword771 FROM clients771");
    $stmt -> execute();
    $stmt -> store_result();
    $stmt -> bind_result($client_id, $client_name, $password);
    // Loops through users to check for existing usernames and passwords
    while ($stmt -> fetch()) {
        //Checks username to see if it is compatible with database
        if($client_id_entry != null && $client_id_length < 31 && $client_id_length > 0){
            $error = '';
            $status = 0;
        }else{
            $error = "Username must be between 1-30 characters!\n";
            $status = 1;
            break;
        }
        //Checks to see if username was verified as valid
        if($status == 0){
            if($client_id_entry == $client_id){
                $username_status = 0;
                $error = '';
            }else{
                $error = "Client ID not found, please try again!"; //error if name does not exist in database
                $status = 1;
            }
        }
        //Checks password to see if it is compatible with database
        if($username_status == 0){
            if($password_entry != null && $password_length < 21 && $password_length >= 7){
                $error = '';
                $status = 0;
            }else{
                $error = "Password must be between 7-20 characters!\n";
                $status = 1;
            }
        }
        // Checks to see if input was verified successfully
        if($client_id_entry == $client_id){ 
            if (password_verify($password_entry, $password)){
                $pass_ver = TRUE;
            }
            if($pass_ver == TRUE){
                $status = 0;
                $_SESSION["signin"] = TRUE;
                $_SESSION["client_id"] = $client_id;
                header('Location: index.php');
            }else{
                $error = "Password is incorrect, please try again!\n";
                $status = 1;
                break;
            }
        }
    }
    // Clear error on refresh or navigation
    if(!isset($_POST["Submit"])){
        $error = '';
    }
    
    $signin_output = <<<SIGNINCARD
    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-2">
        <h1 class="fw-bolder text-center">Sign-In</h1>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 ">   
            <!-- Outputs Error Message --> 
            <p class="text-center text-danger"> $error </p>
            <form method="post">
                <br />
                <div class="form-floating mb-2">
                    <input type="text" name="ClientId" id="floatingUsername" placeholder="Client ID" class="form-control" value="$client_id_entry" />
                    <label for="floatingUsername">Enter Client ID</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" name="Password" id="floatingPassword" class="form-control" placeholder="Enter Company Password" value="$password_entry" />
                    <label for="floatingPassword">Enter Password</label>
                </div>
                <br>
                <div class="d-grid"><input name = "Submit" type ="Submit" class="btn btn-secondary btn-lg" value="Submit" /></div>                           
            </form>
        </div>
    </div>
    SIGNINCARD;
    echo $signin_output; // Outputs Sign-In form
    $conn->close(); //Close connection
?>
<?php
    if($_SESSION["signin"] == TRUE){     
        $button_output = <<<BUTTONOUTPUT
            <div class="nav-item dropdown me-3">
                <a class="nav-link dropdown-toggle" id="navbarDropdownSignin" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Signout</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownSignin">
                    <li><a class="dropdown-item" href="php/signout.php">Sign Out</a></li>
                </ul>
            </div>
            BUTTONOUTPUT;
    }else{
        $button_output = <<<BUTTONOUTPUT
        <div class="nav-item dropdown me-3">
            <a class="nav-link dropdown-toggle" id="navbarDropdownSignin" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Signin</a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownSignin">
                <li><a class="dropdown-item" href="signin.php">Sign In</a></li>
                <li><a class="dropdown-item" href="create_account.php">Create Account</a></li>
            </ul>
        </div>
        BUTTONOUTPUT;
    }
    echo $button_output;
?>
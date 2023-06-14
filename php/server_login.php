<?php 
    //Sign in and page array variables
    $host = 'rachel.whc.ca';
    $database = 'lvrukr54_csci4140_assn2';
    $username = 'lvrukr54_admin';
    $password = 'js?MFDwx*Ap?';
    //Connects to database
    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed!" . mysqli_connect_error());
    }
?>
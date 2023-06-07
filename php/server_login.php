<?php 
    //Sign in and page array variables
    $host = 'localhost';
    $database = 'csci4140_assn1_771';
    $username = 'root';
    $password = 'root';
    //Connects to database
    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed!" . mysqli_connect_error());
    }
?>
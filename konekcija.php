<?php
    $servername = "localhost";
    $username = "admin";
    $password = "admin123";
    $database = "network";

    global $conn;

    $conn = new mysqli($servername, $username, $password, $database);

    if($conn->connect_error)
    {
        die("Neuspela konekcija! Razlog: "
            . $conn->connect_error);
    }

    $conn->set_charset('utf8');
?>
<?php
$mysqli = new mysqli("localhost", "root", "abc123", "Aerial");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;   
    }
    $mysqli2 = new mysqli("localhost", "root", "abc123", "Aerial");
    if ($mysqli2->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli2->connect_error;   
    }
    $mysqli3 = new mysqli("localhost", "root", "abc123", "Aerial");
    if ($mysqli3->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli3->connect_error;   
    }
?>

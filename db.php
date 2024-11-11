<?php
    $conn = new mysqli("localhost", "root", "", "retro");
    if ($conn->connect_error) {
    exit("Connection failed: " . $conn->connect_error);
    }
?>

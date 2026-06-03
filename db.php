<?php
$conn = new mysqli("localhost", "root", "", "tourist_medicare");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
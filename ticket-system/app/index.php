<?php

$conn = new mysqli(
    "mysql",
    "root",
    "root123",
    "tickets"
);

if ($conn->connect_error) {
    die("Connection Failed");
}

echo "<h1>Ticket Management System</h1>";

$sql = "CREATE TABLE IF NOT EXISTS tickets(
id INT AUTO_INCREMENT PRIMARY KEY,
subject VARCHAR(255)
)";

$conn->query($sql);

echo "Database Connected Successfully";
?>

<?php

$conn = new mysqli(
    "mysql",
    "root",
    "root",
    "monitor"
);

if ($conn->connect_error) {
    die("DB Connection Failed");
}

?>

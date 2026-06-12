<?php

$conn = new mysqli(
    "mysql",
    "root",
    "root",
    "tickets"
);

if($conn->connect_error){
    die("Connection Failed");
}
?>

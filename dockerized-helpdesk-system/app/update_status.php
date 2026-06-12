<?php

include 'db.php';

$id=$_GET['id'];

$conn->query("
UPDATE tickets
SET status='CLOSED'
WHERE id='$id'
");

header("Location:index.php");

?>

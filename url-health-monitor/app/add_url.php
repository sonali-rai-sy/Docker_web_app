<?php

include 'db.php';

$url=$_POST['url'];

$conn->query("
INSERT INTO monitored_urls(url)
VALUES('$url')
");

header("Location:index.php");

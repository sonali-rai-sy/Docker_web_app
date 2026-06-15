<?php

include 'db.php';

$conn->query("

CREATE TABLE IF NOT EXISTS monitored_urls(

id INT AUTO_INCREMENT PRIMARY KEY,
url VARCHAR(500),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

)

");

$conn->query("

CREATE TABLE IF NOT EXISTS url_status(

id INT AUTO_INCREMENT PRIMARY KEY,
url_id INT,
http_code INT,
response_time FLOAT,
checked_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

)

");

echo "Tables Created";

?>

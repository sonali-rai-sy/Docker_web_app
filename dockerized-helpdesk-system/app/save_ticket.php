<?php

include 'db.php';

$ticketId="TKT".time();

$subject=$_POST['subject'];
$description=$_POST['description'];
$category=$_POST['category'];
$priority=$_POST['priority'];

$conn->query("

CREATE TABLE IF NOT EXISTS tickets(

id INT AUTO_INCREMENT PRIMARY KEY,
ticket_id VARCHAR(20),
subject VARCHAR(255),
description TEXT,
category VARCHAR(50),
priority VARCHAR(20),
status VARCHAR(20),
assigned_to VARCHAR(100),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

)

");

$sql="

INSERT INTO tickets(
ticket_id,
subject,
description,
category,
priority,
status
)

VALUES(

'$ticketId',
'$subject',
'$description',
'$category',
'$priority',
'OPEN'

)

";

$conn->query($sql);

header("Location:index.php");

?>

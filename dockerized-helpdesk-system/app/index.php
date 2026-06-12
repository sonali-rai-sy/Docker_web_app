<?php

include 'db.php';

$open=$conn->query("
SELECT COUNT(*) c
FROM tickets
WHERE status='OPEN'
")->fetch_assoc()['c'];

$closed=$conn->query("
SELECT COUNT(*) c
FROM tickets
WHERE status='CLOSED'
")->fetch_assoc()['c'];

$result=$conn->query("
SELECT *
FROM tickets
ORDER BY created_at DESC
");

?>

<html>

<head>

<title>HelpDesk Dashboard</title>
<link rel="stylesheet" href="style.css">

</head>

<body>

<h1>HelpDesk Dashboard</h1>

<h3>Open Tickets : <?php echo $open; ?></h3>

<h3>Closed Tickets : <?php echo $closed; ?></h3>

<a href="create_ticket.php">
Create Ticket
</a>

<br><br>

<table>

<tr>

<th>Ticket ID</th>
<th>Subject</th>
<th>Category</th>
<th>Priority</th>
<th>Status</th>
<th>Action</th>

</tr>

<?php

while($row=$result->fetch_assoc()){

?>

<tr>

<td><?php echo $row['ticket_id']; ?></td>

<td><?php echo $row['subject']; ?></td>

<td><?php echo $row['category']; ?></td>

<td><?php echo $row['priority']; ?></td>

<td><?php echo $row['status']; ?></td>

<td>

<a href="update_status.php?id=<?php echo $row['id']; ?>">
Close
</a>

</td>

</tr>

<?php

}

?>

</table>

</body>

</html>

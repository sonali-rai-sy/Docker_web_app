<!DOCTYPE html>
<html>
<head>
<title>Create Ticket</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Create Ticket</h1>

<form action="save_ticket.php" method="post">

<input type="text"
       name="subject"
       placeholder="Subject"
       required>

<select name="category">

<option>Server</option>
<option>Database</option>
<option>Network</option>
<option>Application</option>

</select>

<select name="priority">

<option>Low</option>
<option>Medium</option>
<option>High</option>

</select>

<textarea
name="description"
placeholder="Description"></textarea>

<button type="submit">


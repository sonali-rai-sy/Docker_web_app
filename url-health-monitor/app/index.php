<?php
include 'db.php';
?>

<html>

<head>

<title>URL Health Monitor</title>

<link rel="stylesheet"
href="style.css">

</head>

<body>

<h1>URL Health Monitor</h1>

<form action="add_url.php"
method="post">

<input type="text"
name="url"
placeholder="https://google.com"
required>

<button>Add URL</button>

</form>

<br>

<a href="check_urls.php">
Run Health Check
</a>

<br><br>

<table>

<tr>

<th>URL</th>
<th>Status</th>
<th>Response Time</th>
<th>Last Checked</th>

</tr>

<?php

$sql="

SELECT
m.url,
s.http_code,
s.response_time,
s.checked_at

FROM monitored_urls m

LEFT JOIN url_status s

ON m.id=s.url_id

WHERE s.id IN (

SELECT MAX(id)
FROM url_status
GROUP BY url_id

)

";

$result=$conn->query($sql);

while($row=$result->fetch_assoc()){

echo "<tr>";

echo "<td>".$row['url']."</td>";

echo "<td>".$row['http_code']."</td>";

echo "<td>".$row['response_time']." sec</td>";

echo "<td>".$row['checked_at']."</td>";

echo "</tr>";

}

?>

</table>

</body>

</html>

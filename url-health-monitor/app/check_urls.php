<?php

include 'db.php';

$urls=$conn->query("
SELECT *
FROM monitored_urls
");

while($row=$urls->fetch_assoc()){

    $ch=curl_init($row['url']);

    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_TIMEOUT,10);

    $start=microtime(true);

    curl_exec($ch);

    $responseTime=
    round(microtime(true)-$start,3);

    $httpCode=
    curl_getinfo(
        $ch,
        CURLINFO_HTTP_CODE
    );

    curl_close($ch);

    $conn->query("
    INSERT INTO url_status(
    url_id,
    http_code,
    response_time
    )
    VALUES(
    {$row['id']},
    $httpCode,
    $responseTime
    )
    ");
}

header("Location:index.php");

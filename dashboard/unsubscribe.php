<?php

require '../newsletter.php';

$json = file_get_contents("php://input");
$result = json_decode($json, true);
$id = $result['id'];
$db =  new Database('host', 'database user', 'database password', 'database');
$newsletter = new Newsletter($db);
$newsletter->unsubscribe($id);

?>
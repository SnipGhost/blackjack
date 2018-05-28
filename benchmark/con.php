<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);
$mysqli = new mysqli("localhost", "root", "214736", "blackjack");
if ($mysqli->connect_errno) {
    throw new Exception('Could not connect: '.$mysqli->connect_error);
}
if (!$mysqli->set_charset('utf8')) {
    throw new Exception('Error loading character set utf8: '.$mysqli->error);
}
$res = $mysqli->query("SHOW TABLES");
while ($row = $res->fetch_assoc()) {
	var_dump($row);
	echo "<br>";
}
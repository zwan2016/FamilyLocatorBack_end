<?php
require_once'config.php';
$con =mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME, $con);
$uid = $_POST['uid'];
$latitude = (double)$_POST['latitude'];
$longitude = (double)$_POST['longitude'];
$time = (float)$_POST['time'];

$query = "INSERT INTO Location(UId, Longitude, Latitude, Time) 
VALUES('$uid', '$longitude', '$latitude', '$time')";
mysql_query($query, $con);

?>

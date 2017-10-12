<?php
require_once'config.php';
$con =mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME, $con);
$uid = $_POST['uid'];
$fid = $_POST['fid'];
$content = trim($_POST['content']);
$time = (float)$_POST['time'];
//echo $email;
//echo $password;

$query = "INSERT INTO Message(UId, FId, Content, Time)
VALUES('$uid', '$fid', '$content', '$time')";
mysql_query($query, $con);

?>

<?php
require_once'config.php';
$con =mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME, $con);
$uid = $_POST['uid'];
$time = (float)$_POST['time'];
$query = "SELECT* FROM Location WHERE UId = '$uid' AND Time>'$time'-86400000 AND Floor(Time%60000)<10000";
$data = mysql_query($query, $con);
$resultArray = array();
while($row = mysql_fetch_array($data)){
	array_push($resultArray, $row);
}
echo json_encode($resultArray);

?>

<?php
require_once'config.php';
$con =mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME, $con);
$fid = $_POST['fid'];
$time = (float)$_POST['time'];
#SELECT* FROM Record LEFT JOIN Users ON Record.UId = Users.Id WHERE Postpone = 1
$query = "SELECT* FROM Message JOIN User ON Message.UId = User.UId WHERE Message.FId = '$fid' AND Message.Time > '$time'";
$data = mysql_query($query, $con);
$resultArray = array();
while($row = mysql_fetch_array($data)){
	array_push($resultArray, $row);
}
echo json_encode($resultArray);

?>

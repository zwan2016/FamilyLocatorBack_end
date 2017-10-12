<?php
require_once'config.php';
$con =mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME, $con);
$fid = $_POST['fid'];
$query = "SELECT* FROM User WHERE FId = '$fid'";
$data = mysql_query($query, $con);
$resultArray = array();
while($row = mysql_fetch_array($data)){
	$uid = $row['UId'];
	$query1 = "SELECT* FROM Location WHERE UId='$uid' AND Time = (SELECT MAX(Time) FROM Location WHERE UId='$uid')";
  $data1 = mysql_query($query1, $con);
  $row1 = mysql_fetch_array($data1);
  if(isset($row1['UId'])){
    array_push($resultArray, $row1);
  }
}
echo json_encode($resultArray);

?>

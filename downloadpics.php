<?php
require_once'config.php';
$con =mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME, $con);
$fid = $_POST['fid'];
$query = "SELECT UId, Username, Picture FROM User WHERE FId = '$fid'";
$data = mysql_query($query, $con);
$resultArray = array();
while($row = mysql_fetch_array($data)){
    array_push($resultArray, $row);
}
echo json_encode($resultArray);

?>

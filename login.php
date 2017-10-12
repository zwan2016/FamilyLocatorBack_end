<?php
require_once'config.php';
$con =mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME, $con);
$email = $_POST['email'];
$password = trim($_POST['password']);
//echo $email;
//echo $password;

$query = "SELECT* FROM User WHERE Email = '$email' AND Password = '$password'";
//$query = "SELECT* FROM User WHERE Password ='lsy'";
$data = mysql_query($query, $con);
if(mysql_num_rows($data) == 1){
	$row = mysql_fetch_array($data);
	$uid = $row['UId'];
	$fid = $row['FId'];
	$invitationquery = "SELECT InvitationCode FROM Family WHERE FId='$fid'";
	$invitationdata = mysql_query($invitationquery, $con);
	$invitation = mysql_fetch_array($invitationdata)['InvitationCode'];
	$resultArray = array();
	$resultArray['uid'] = $uid;
	$resultArray['fid'] = $fid;
	$resultArray['invitation'] = $invitation;
	echo json_encode($resultArray);
}
else{
	echo "fail";
}

?>

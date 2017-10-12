<?php
//echo $_POST["description"];
//echo $_FILES["fileUpload"]['name'];
//echo $_POST['guardian'];
$file_path = "profile_pic/";
$picture = $file_path.$_FILES['fileUpload']['name'];
move_uploaded_file($_FILES['fileUpload']['tmp_name'], $file_path.$_FILES['fileUpload']['name']);

require_once'config.php';
$con =mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME, $con);
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$familyname = $_POST['family'];
$invitation = $_POST['invitation'];
if($_POST['guardian']=="false"){
	$guardian = 0;
}
else{
	$guardian = 1;
}

$query = "INSERT INTO Family(FamilyName,InvitationCode)
VALUES('$familyname', '$invitation')";
$fidquery = "SELECT @@IDENTITY";
mysql_query($query, $con);
$data = mysql_query($fidquery, $con);
$fid = mysql_fetch_array($data)['@@IDENTITY'];

$query = "INSERT INTO User(FId, Username, Email, Password, Picture, Guardian) 
VALUES('$fid', '$username', '$email', '$password', '$picture', '$guardian')";
$uidquery = "SELECT @@IDENTITY";
if(mysql_query($query, $con)){
	$uiddata = mysql_query($uidquery, $con);
	$uid = mysql_fetch_array($uiddata)['@@IDENTITY'];
	$resultArray = array();
	$resultArray['uid'] = $uid;
	$resultArray['fid'] = $fid;
	$resultArray['invitation'] = $invitation;
	echo json_encode($resultArray);
}
else{
	echo "failemail";//email duplicate
}


?>

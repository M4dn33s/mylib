<?php
include("inc/connect.php");
#include("inc/function.php");
$id=$_GET['id'];
if(!isset($_GET['id'])){
header("location: uno.php?id=1");
}
$con->select_db("uno");

$sql = "SELECT article,content from uno.news where id=$id";
$pat = '/^s3c/';
if ($res = $con->query($sql)){
	while ($row = $res->fetch_row()){
		if(preg_match($pat, $row[0]) or preg_match($pat, $row[1])){
			echo "You Passed first trial. Well Done.<br> <a href=\"dob.php?id=1\">3rd Trial</a>";
		}
		printf("<h2>%s</h2><p>%s</p>", $row[0],$row[1]);
	}
	$res->free_result();
}

$con->close();
?>
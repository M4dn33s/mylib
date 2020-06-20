<?php
include("inc/connect.php");
include("inc/function.php");
$id="(\"".$_GET['id']."\")";
if(!isset($_GET['id'])){
header("location: dob.php?id=1");
}
$con->select_db("dob");

$sql = "SELECT article,content from dob.news where id=$id";
$pat = '/^30z/';
if ($res = $con->query($sql)){
	while ($row = $res->fetch_row()){
		if(preg_match($pat, $row[0]) or preg_match($pat, $row[1])){
			echo "You Passed first trial. Well Done.<br><a href=\"blind.php?id=1\">4th Trial</a>";
		}
		printf("<h2>%s</h2><p>%s</p>", $row[0],$row[1]);
	}
	$res->free_result();
}
echo "<b>Hint:</b>sometime thing seems open but they are closed();";
$con->close();
?>

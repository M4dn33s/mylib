<?php
include("inc/connect.php");
include("inc/function.php");
$id=$_GET['id'];
if(!isset($_GET['id'])){
header("location: blind.php?id=1");
}
$con->select_db("blind");

$sql = "SELECT article,content from blind.news where id=$id limit 0,1";
$pat = '/^/';
if ($res = $con->query($sql)){
	$row =$res->fetch_array();
	if($row){
		echo "<font size='5' color= '#812816'>";	
	  echo '<center>Title: '. $row[0];
		//echo 'YOU ARE IN ........';	  	
		echo "</font></center><br><br><font size='4' color='#812816'>";
	  echo 'Content: ' .$row[1];
	  echo "</font>";
	}else{
		echo '<h1>Nice Try...!</h1>';
	}
	$res->free();
}
echo "<b>Hint1:</b>You can't see values unless you go blind!";
echo "<b>Hint2:</b>Going back to places can sometimes help!.";
$con->close();

?>

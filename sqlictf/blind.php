<?php
include("inc/connect.php");
include("inc/function.php");
$id=$_GET['id'];
if(!isset($_GET['id'])){
header("location: blind.php?id=1");
}
sqlmapB(); //sqlMap Block -beginners only;
$con->select_db("blind");
filter_user_inputB($id);
$sql = "SELECT article,content from blind.news where id=$id limit 0,1";
$pat = '/substr/';
$pat1 = '/su3r/';
$pat2 = '/G/';
if ($res = $con->query($sql)){
	$row =$res->fetch_array();
	if($row){
		if(preg_match($pat, $id) && preg_match($pat1, $id) && preg_match($pat2, $id) or preg_match('/71/',$id)){
			echo "You Passed fourth trial. Well Done.<br> <a href=\"dob.php?id=1\">Final Trial</a>";
		}
		echo "<font size='5' color= '#812816'>";	
	  echo '<center>Title: '. $row[0];  	
		echo "</font></center><br><br><font size='4' color='#812816'>";
	  echo 'Content: ' .$row[1];
	  echo "</font>";
	}else{
		echo '<h1>Nice Try...!</h1>';
	}
	$res->free();
}
	echo "<br><b>Hint1:</b>You can't see values unless you go blind!";
	echo "<br><b>Hint2:</b>Going back to places can sometimes help!.";

$con->close();

?>

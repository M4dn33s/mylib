<?php
include("inc/connect.php");
include("inc/function.php");
sqlmapB();
if(!isset($_GET['Final']) or $_GET['Final'] != $finaly){
	echo "<h1>Welcome to small CTF</h1>";
	echo "<p>Your goal is to find hidden Flag through passing the trials.</p>";
	echo "<p>when Every your Ready click on the link bellow<p>";
	echo "<center><a href=\"login.php\">click Here</a></center>";
}else {
	end_comp();
}
?>
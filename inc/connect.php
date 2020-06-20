<?php
$host="localhost";
$user="mylib";
$pass="toor";

$con = new mysqli($host,$user,$pass);

if(mysqli_connect_errno()){
	printf("Connect Failed: %s\n", mysqli_connect_errno());
	exit();
}

?>
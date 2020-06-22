<?php
include("connect.php");
$finaly='wofwof';
function sqlmapB(){
	$u_agent = $_SERVER['HTTP_USER_AGENT'];
	if(preg_match('/sqlmap/', $u_agent))
	{
		die("SQLMAP NOT ALLOWED");
	}
}
function filter_user_inputB(&$string) {
	$badwords = array('union','order','having','by', 'group');
	$string = str_ireplace($badwords, "", $string);
	#$string = preg_replace('/\\s+/', ' ', $string);
	// This trims any spaces at beginning and end of variable

	return $string;

}
function filter_user_inputW(&$string) {
	$badwords = array('union','order','having','by', 'group', 'select', 'all', 'concat', 'from', 'information_schema', 'wofwof', 'Select','Union','sElect','uNion');
	$string = str_replace($badwords, "", $string);
	#$string = preg_replace('/\\s+/', ' ', $string);
	// This trims any spaces at beginning and end of variable

	return $string;

}

function end_comp(){
	global $con; // <-- global from connect.php
	global $finaly;
	$id=$_GET['id'];
	if(!isset($_GET['id'])){
		header("location: index.php?Final=$finaly&id=1");
	}
	sqlmapB();
	$con->select_db("waf");
	filter_user_inputW($id);
	$sql = "SELECT article,content from waf.news where id=$id limit 0,1";
	$pat ='/yamcha/';
	if ($res = $con->query($sql)){
		while ($row = $res->fetch_row()){
			if(preg_match($pat, $row[0]) or preg_match($pat, $row[1])){
				die('<p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://fsmedia.imgix.net/df/31/01/75/3b41/45e4/873e/7c4cd155798a/yamcha.jpeg?rect=0%2C62%2C720%2C359&amp;auto=format%2Ccompress&amp;dpr=2&amp;w=650" alt="" width="500" /></p><p style="text-align: center;"><b>I Give UP.</b></p>
<p style="text-align: center;"><strong>CTF{1_c4n_d0_sQl_4nj3ct10n}</strong></p>');
			}
		printf("<h2>%s</h2><p>%s</p>", $row[0],$row[1]);
		}
	$res->free_result();
	}

}
?>
<?php
include("inc/connect.php");
include("inc/function.php");
sqlmapB();
session_start();
$username = $_POST['uname'];
$password = $_POST['pass'];
$hint = $_GET['hint'];
if (isset($_POST['uname']) and isset($_POST['pass'])){
	$con->select_db('login');
	$sql = "SELECT id from login.admin where user='$username' and pass='$password' limit 0,1";
	$result = $con->query($sql);
	$row = $result->num_rows;
	if($row != 0){
		echo "<b>Well Done Now Jump Toward next trial <a href=\"uno.php?id=1\">GO..!</a></b>";

	}else {
		echo "Error Login!";
	}
	$result->free();
	$con->close();

}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  width: auto;
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  display: block;
  margin: auto;
  width: 15%;
  border-radius: 30%;
}

.container {
  padding: 5px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2>Login Form</h2>

<form action="<?php if($hint == 'ok'){ echo "login.php?hint=ok";}else {echo "login.php";}?>" method="post">
  <div class="imgcontainer">
    <img src="ave.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required>

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label><?php if($hint=='ok'){echo ' 
    <label>
    	<b>
    	<a href="https://pentestlab.blog/2012/12/24/sql-injection-authentication-bypass-cheat-sheet/"> Try these code Might work !</a></b>
    </label>';}?>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">HELP ME:<a href="login.php?hint=ok">Hint</a></span>
  </div>
</form>

</body>
</html>

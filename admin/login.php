<?php include("includes/connect.php"); ?>
<?php 
session_start();
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$password = $_POST['pass'];
	$queryy = "SELECT * FROM admin ";
	$resu = mysqli_query($connection,$queryy);
	while($res = mysqli_fetch_assoc($resu)){
		$hash = $res['password'];
		$username = $res['username'];
		if(password_verify($password, $hash) && ($username==$name)){
			/*$query = "SELECT * FROM admin where username = '$name' AND password = '$password' ";
$result = mysqli_query($connection,$query);
if(mysqli_num_rows($result)>0){*/
	$_SESSION['admin'] = '$name';
	header("Location:admin.php");
}
}}
else{?>
<script type="text/javascript">
alert("username and password not matched");
</script>
<?php		
	}
?>
<html>
<form action="login.php" method="post">
Username: <input type="text" name="name" /><br/>
Password: <input type="password" name="pass" /><br/>
<input type="submit" name="submit" value="Login"/>
<h4>Don't Have ID? Please Click Register to signup</h4>

	</form>
	<form action="register.php" method="post">
		<input type="submit" value="Register"name="register" />
	</form>
</html>
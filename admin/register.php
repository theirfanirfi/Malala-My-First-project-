<?php include("includes/connect.php"); ?>
<?php 
if(isset($_POST['submit'])){
	if((!empty($_POST['name'])) || (!empty($_POST['pass']))){
		if((!empty($_POST['name'])) && (!empty($_POST['pass']))){
		$name = $_POST['name'];
	$pass = $_POST['pass'];
	$hash = password_hash($pass, PASSWORD_DEFAULT);
	$query ="INSERT INTO admin(username,password) values('$name','$hash') ";
	$result = mysqli_query($connection,$query);
	if($result){
		$msg = "";
		header("Location:login.php");
	}
	else{
		$msg = "Failed";
	}
}}else {
	$msg = "field can't  be empty";
}

}

?>

<html>

<?php global $msg;
echo $msg; ?>
<form action="register.php" method="post">
	Username:<input type="text" name="name" value="" /><br/>
	Password:<input type="password" name="pass" value=""/><br/>
	<input type="submit" name="submit" value="Signup"/>



</html>
<?php include("includes/connect.php"); ?>
<?php session_start(); ?>
<?php if(!isset($_SESSION['admin'])){
	header("Location:login.php");
}
?>

<?php 
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$query = "Delete from posts where post_id = '$id' LIMIT 1 ";
	$result = mysqli_query($connection,$query);
	if($result){
		header("Location:admin.php?view=view");
	}
}
?>
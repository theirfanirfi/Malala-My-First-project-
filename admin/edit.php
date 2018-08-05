<?php include("includes/connect.php"); ?>
<?php session_start(); ?>
<?php if(!isset($_SESSION['admin'])){
	header("Location:login.php");
}
?>
<html>
<head>
	<title>Edit Post</title>
</head>
<body>

<?php 
	if(isset($_GET['id'])){
	$id_pst = $_GET['id'];
	$query = "SELECT * FROM posts where post_id = '$id_pst' ";
	$result = mysqli_query($connection,$query);
	while($res = mysqli_fetch_assoc($result)){
		$id = $res['post_id'];
		$title = $res['post_title'];
		$image = $res['post_image'];
		$Content = $res['post_content'];
		$author = $res['post_author'];
	}
}

	?>




		<form method="post" action="edit.php?edit_id=<?php echo $id; ?>" enctype="multipart/form-data">
		<table align="center" border="10px" width="600">
			<tr>
				<td align="center" colspan="5" bgcolor="yellow"><h1>Edit Post here</h1></td>
				</tr>
				<tr>
					<td>Post Title:</td>
					<td><input type="text" name="title" value="<?php echo $title; ?>"/></td>
					</tr>
					<tr>
					<td>Post Author:</td>
					<td><input type="text" name="Author" value="<?php echo $author; ?>"/></td>
					</tr>
					<tr>
					<td>Post Image:</td>
					<td><input type="file" name="image"/></td>
					</tr>
					<tr>
					<td >Post contents:</td>
					<td><textarea name="content" cols="30" rows="20"><?php echo $Content; ?></textarea></td>
					</tr>
					<tr>
					<td align="center" colspan="5"><input type="submit" name="submit" value="Edit Now"/></td>
					</tr>

</body>
</html>
<?php 
	if(isset($_POST['submit'])){
		 $title = $_POST['title'];
		 $date = date('y/m/d');
		$Author = $_POST['Author'];
		 $content = $_POST['content'];
		 $image_name = $_FILES['image']['name'];
		 $image_type = $_FILES['image']['type'];
		 $image_size = $_FILES['image']['size'];
		 $image_tmp = $_FILES['image']['tmp_name'];
		 if($title=='' || $Author=='' || $content==''){
		 	echo "<script>alert('Any field is empty')</script>";
		 	exit;
		 }
		 if($image_type=="image/jpeg" || $image_type=="image/png" || $image_type=="image/gif"){
		 	if($image_size<=50000){
		 		move_uploaded_file($image_tmp,"../images/$image_name");

		 	}
		 	else{
		 		echo "<script>alert('only 50kb pic is allowed')</script>";
		 	}
		 }
		 else{
		 	echo"<script>alert('image type is invalid')</script>";
		 }
		 
	}

?>
<?php
		 $queryy ="UPDATE posts SET post_title = '$title',post_date ='$date',post_author = '$Author',post_image = '$image_name',post_content = '$content' where post_id = '{$id_pst}' ";
		 	$resultt = mysqli_query($connection,$queryy);
		 	if($resultt){
		 		header("Location:admin.php?view=view");
		 	}
?>
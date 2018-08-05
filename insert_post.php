<?php session_start(); ?>
<?php if(!isset($_SESSION['admin'])){
	header("Location:admin/login.php");
}
?>
<html>
<head>
	<title>Insert New Post</title>
</head>
<body>
	<form method="post" action="insert_post.php" enctype="multipart/form-data">
		<table align="center" border="10px" width="600">
			<tr>
				<td align="center" colspan="5" bgcolor="yellow"><h1>Inset New Post here</h1></td>
				</tr>
				<tr>
					<td>Post Title:</td>
					<td><input type="text" name="title"/></td>
					</tr>
					<tr>
					<td>Post Author:</td>
					<td><input type="text" name="Author"/></td>
					</tr>
					<tr>
					<td>Post Image:</td>
					<td><input type="file" name="image"/></td>
					</tr>
					<tr>
					<td >Post contents:</td>
					<td><textarea name="content" cols="30" rows="20"></textarea></td>
					</tr>
					<tr>
					<td align="center" colspan="5"><input type="submit" name="submit" value="Publish Now"/></td>
					</tr>

</body>
</html>
<?php include("connect.php"); ?>
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
		 		move_uploaded_file($image_tmp,"images/$image_name");

		 	}
		 	else{
		 		echo "<script>alert('only 50kb pic is allowed')</script>";
		 	}
		 }
		 else{
		 	echo"<script>alert('image type is invalid')</script>";
		 }
		 $query ="insert into posts(post_title,post_date,post_author,post_image,post_content) 

		 	values('$title','$date','$Author','$image_name','$content')";
		 	$result = mysqli_query($connection,$query);
		 	if($result){
		 		header("Location:index.php");
		 	}

	}

?>
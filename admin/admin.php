<?php include("includes/connect.php"); ?>
<?php session_start(); ?>
<?php if(!isset($_SESSION['admin'])){
	header("Location:login.php");
}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="admin-style.css">
</head>
<body>
	<header><h1>Welcome to Admin Panel</h1></header>
	<aside><h2>Manage Content</h2>
		<h3><a href="logout.php">Logout</a></h3>
		<h3><a href="admin.php?view=view">View Posts</a></h3>
		<h3><a href="..\insert_post.php">Insert New Post</a></h3>

	</aside>
</body>
</html>
<?php 
if(isset($_GET['view'])){
	$query = "SELECT * FROM posts";
	$result = mysqli_query($connection,$query);
	while($res = mysqli_fetch_assoc($result)){
		$id = $res['post_id'];
		$title = $res['post_title'];
		$image = $res['post_image'];
		$Content = $res['post_content'];
		$author = $res['post_author'];?><center>
		<h1><?php echo $title; ?></h1>
		<h4><?php echo "Published By: ".$author; ?></h4>
		<img src="../images/<?php echo $image; ?>" width="100" />
		<p style="word-break:break-all;"><?php echo $Content; ?></p>
		<a class="dlt" href="delete.php?id=<?php echo $id; ?>">Delete</a>
		<a class="dlt" href="edit.php?id=<?php echo $id; ?>">Edit</a>


	</center>
	<?php }
}
?>
<?php include("connect.php"); ?>
<html>
<head>
<title>Malala</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="top"><p>TOPBAR</p></div>
	<?php include("includes/header.php"); ?>
	<?php include("includes/nav.php"); ?>
	<?php include("includes/sidebar.php"); ?>
	<div class="post_body">
<?php 
if(isset($_GET['submit'])){
	$search_id = $_GET['search'];
$query ="select * from posts where post_title like '%$search_id%' ";
$result = mysqli_query($connection,$query);
while($res = mysqli_fetch_assoc($result)){
	$id = $res['post_id'];
	$title = $res['post_title'];
	$content = $res['post_content'];
	$image = $res['post_image']; ?>
	<h1><a href="pages.php?id=<?php echo $id; ?>"><?php echo $title; ?></a></h1>
	<a href="pages.php?id=<?php echo $id; ?>"><img src="images/<?php echo $image; ?>" width="100" /></a>
<?php 
}
}
?>
	</div>
<div class="foot">this is footer</div>

</body>
</html>
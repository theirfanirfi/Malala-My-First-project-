<?php include("connect.php"); ?>
<?php  
if(isset($_GET['id'])){
	$page_id = $_GET['id'];
}
?>

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
<?php $query ="SELECT * FROM posts WHERE post_id = '$page_id' ";
$result = mysqli_query($connection,$query);
while($res = mysqli_fetch_assoc($result)){
	$title = $res['post_title'];
	$date = $res['post_date'];
	$image = $res['post_image'];
	$author = $res['post_author'];
	$content = $res['post_content']; } ?>
	<h1> <?php echo $title; ?></h1>
	<h4>Posted By : <?php echo $author; ?> </h4>
	<h4> Published on : <?php echo $date; ?> </h4>
	<img src="images/<?php echo $image; ?>" width="400" />
	<p align="justify" style="word-break:break-all;">
		<?php echo $content; ?> </p>
	</div>

	
	

	<div class="foot">this is footer</div>

</body>
</html>
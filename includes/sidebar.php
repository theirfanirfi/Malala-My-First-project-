<?php include("connect.php"); ?>
<div id="sidebar">
	<h1>Recent Posts</h1>
<?php 
$query = "SELECT * FROM posts order by post_id desc LIMIT 0,3 ";
$result = mysqli_query($connection,$query);
while($res = mysqli_fetch_assoc($result)){
	$id = $res['post_id'];
	$title = $res['post_title'];
	$image = $res['post_image']; ?>
	<a href="pages.php?id=<?php echo $id; ?>"><img src="images/<?php echo $image; ?>" width="200"/></a>
	<a href="pages.php?id=<?php echo $id; ?>"><h3><?php echo $title ?> </h3></a>

<?php }
?>

</div>

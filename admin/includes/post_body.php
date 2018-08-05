<?php include("connect.php"); ?>
<div class="post_body">
<?php 
$query ="SELECT * FROM posts ORDER BY post_id  DESC";
$result = mysqli_query($connection,$query);
while($res = mysqli_fetch_assoc($result)){
	$id = $res['post_id'];
	$title = $res['post_title'];
	$date = $res['post_date'];
	$author = $res['post_author'];
	$content = $res['post_content'];
	$image = $res['post_image']; ?>
	<h2><a href="pages.php?id=<?php echo $id; ?>"><?php echo $title; ?></a> </h2>
	<h4>Posted By: <?php echo $author; ?> </h4>
	<p>Published on: <?php echo $date; ?> </p>
	<img src="images/<?php echo $image; ?>" width="300"/>
	<p align="justify" style = "word-break:break-all;"> <?php echo $content ?> </p>
	<p align="left"><a href="pages.php?id=<?php echo $id; ?>">Read More</a></p>
<?php }

?>
</div>

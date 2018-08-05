<html>
<head>
<title>Malala</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript">
function myclock(){
	var time = new Date();
	var min = time.getMinutes();
	var hour = time.getHours();
	var sec = time.getSeconds();
	if(min<10){min = "0"+min;}
	if(hour<10){hour = "0"+hour;}
	if(sec<10){sec = "0"+sec;}
	document.getElementById("clock").innerHTML= hour+":"+min+":"+sec;
	var timer = setTimeout(function(){myclock()},500);
}

</script>
</head>
<body onload="myclock()">
	<div id="top"><p>Today is <?php echo date("l jS, F Y"); ?></p>
		<div id="clock" class="clock"></div>
	</div>
	<?php include("includes/header.php"); ?>
	<?php include("includes/nav.php"); ?>
	<?php include("includes/sidebar.php"); ?>
	<?php include("includes/post_body.php"); ?>

	
	

	<div class="foot">this is footer</div>

</body>
</html>
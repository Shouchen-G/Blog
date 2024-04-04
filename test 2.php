<?php
$conn = new mysqli("localhost", "admin", "admin", "genshindata");
?>
<!DOCTYPE html>
<html>
<head>
	<title>View</title>
	<style>
		.content {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
			min-height: 30vh;
			max-width: 50vh;
		}
		.alb {
			width: 200px;
			height: 200px;
			padding: 5px;
		}
		.alb img {
			width: 100%;
			height: 100%;
		}
		a {
			text-decoration: none;
			color: black;
		}
	</style>
</head>
<body>
	<div class="content">
     <a href="index.php">&#8592;</a>
     <?php 
          $sql = "SELECT * FROM foodimg ORDER BY id ASC";
          $res = mysqli_query($conn,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	while ($images = mysqli_fetch_assoc($res)) {  ?>
             
             <div class="alb">
             	<a href ="<?=$images['url']?>"><img src="<?=$images['img_dir']?>"></a>
             </div>
          		
    <?php } }?>
			</div>
</body>
</html>
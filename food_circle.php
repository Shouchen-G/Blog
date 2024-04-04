<?php
require 'conf.php';
?>

<?php
  $msg = "";

    if (isset($_POST['upload'])) {
  	$image = $_FILES['image']['name'];
  	$text = $_POST['text'];

  	$target = "images/".basename($_FILES['image']['name']);

  	$sql = "INSERT INTO post (id,image, text) VALUES ('','$image', '$text')";
  	mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($conn, "SELECT * FROM post");
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
   #content{
	display: flex;
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
    flex-wrap: wrap;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }

	button[type="submit"] {
	border-radius: 4px;
	background-color: #f4511e;
	border: none;
	color: #FFFFFF;
	text-align: center;
	font-size: 28px;
	padding: 20px;
	width: 200px;
	transition: all 0.5s;
	cursor: pointer;
	margin: 5px;
}

button[type="submit"] span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

button[type="submit"] span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

button[type="submit"]:hover span {
  padding-right: 25px;
}

button[type="submit"]:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
</head>
<body>
<div id="content">
 
  <form method="POST" action="food_circle.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea 
      id="text"
      	cols="40" 
      	rows="4" 
      	name="text" 
      	placeholder="Say something about this image..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload"> <span>POST </span></button>
  	</div>
  </form>

  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' >";
      	echo "<p>".$row['text']."</p>";
      echo "</div>";
    }
  ?>
</div>
</body>
</html>



<!-- reference: https://www.youtube.com/watch?v=Ipa9xAs_nTg -->
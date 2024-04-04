<?php 
require 'conf.php';
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) 

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
    crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Genshin World</title>
</head>
<body>
    <nav>
        <div id="logo-img">
                <img src="img/logo.webp" alt="Genshin Logo">

                
        </div>

        <div id="user">
        <?php if (isset($_SESSION['name'])) {
                 ?>
                <h1>Hello, <?=$_SESSION['name'] ?>!</h1>
                <form action="logout.php" method="post">
                <input type="submit" value="Log out">
                </form>
                <?php
                }
                ?>
        </div>

        <!-- <div id="menu-icon">
            <i class="fas fa-bars"></i>
        </div> -->
        <ul>
            <li>
                <a class="active" href="index.php">Home</a>
            </li>
            <li>
                <a href="food_circle.php">Food Circle</a>
            </li>
            <li>
                <a href="login.php">Login</a>
            </li>
            <li>
                <a href="https://genshin.hoyoverse.com/en">Official Site</a>
            </li>
        </ul>
    </nav>

    <div id="banner">
        <h1>&lt;Genshin World&gt;</h1>
        <h3>A bite of Genshin</h3>
    </div>

    
    <main>
    <h2>About</h2>
    <P> This web was inspired by Genshin impact, which is my favourite RPG game.</P> 
    <P>    When I saw the food consumables in the game, I was truely attracted, and the food in the game are based on real-life. I am a food lover and sometimes would like to try a new recipe, 
        Genshin gave me the idea to try different authentic exotic food which is so exciting. </p>
     <P> My idea for this web is to explore the recipe for food lover and also can share the post on Food Circle</P>   
    <h2>All food in Genshin World</h2>
    <div class="content">
     <?php 
          $sql = "SELECT * FROM foodimg ORDER BY id ASC";
          $res = mysqli_query($conn,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	while ($images = mysqli_fetch_assoc($res)) {  ?>
             
             <div class="alb">
             	<a href ="<?=$images['url']?>"><img src="<?=$images['img_dir']?>"></a>
                 <?php echo  $images['title']?>
             </div>
          		
    <?php } }?>
			</div>
         

    <h2>Sorting in category</h2>
    <div class="food_cat">
    <?php
        $category = 0;
        if (isset($_REQUEST['category']))
            $category = $_REQUEST['category'];
    ?>
            <form method="get">
            <select name="category">
    <?php
            $result = $conn->query("SELECT * FROM foodcat;");
            foreach ($result as $row) {
    ?>
                <option value="<?=$row['id']?>"<?php
                    if ($category == $row['id']) {echo " selected";}
                ?>><?=$row['cat']?></option>
    <?php
            }
    ?>
            </select>
            <input type="hidden" value="category" name="sorting_food" />
            <input type="submit" value="Submit" />
            </form>
    <?php
            if ($category) {
                $query = $conn->prepare("SELECT * FROM foodimg WHERE cat_id = ? ;");
                $query->bind_param("i", $category);
                $query->execute();
                $result = $query->get_result();
    ?>
            
    <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($images = mysqli_fetch_assoc($result)) {  ?>
                
                <div class="food_cat_item">
                    <a href ="<?=$images['url']?>"><img src="<?=$images['img_dir']?>"></a>
                    <?php echo  $images['title']?>
                </div>
                        
        <?php } }?>
    <?php
                
            }
    ?>
            </div>


<h2>Areas </h2>
<div class="container">
<div class="mySlides">
  <div class="numbertext">1 / 4</div>
    <img src="img/Mondstadt.webp" style="width:100%">
</div>

<div class="mySlides">
  <div class="numbertext">2 / 4</div>
    <img src="img/Liyue.webp" style="width:100%">
</div>

<div class="mySlides">
  <div class="numbertext">3 / 4</div>
    <img src="img/Inazuma.webp" style="width:100%">
</div>

<div class="mySlides">
  <div class="numbertext">4 / 4</div>
    <img src="img/Sumeru.jpg" style="width:100%">
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

<div class="caption-container">
  <p id="caption"></p>
</div>

<div class="row">
  <div class="column">
    <img class="demo cursor" src="img/Mondstadt.webp" style="width:100%" onclick="currentSlide(1)" alt="Mondstadt">
  </div>
  <div class="column">
    <img class="demo cursor" src="img/Liyue.webp" style="width:100%" onclick="currentSlide(2)" alt="Liyue">
  </div>
  <div class="column">
    <img class="demo cursor" src="img/Inazuma.webp" style="width:100%" onclick="currentSlide(3)" alt="Inazuma">
  </div>
  <div class="column">
    <img class="demo cursor" src="img/Sumeru.jpg" style="width:100%" onclick="currentSlide(4)" alt="Sumeru">
  </div>
</div>
</div>   

            <h2>Cuisine Collection &nbsp &nbsp &nbsp<a href= "https://www.youtube.com/@GenshinImpact">more </a></h2> 
            <div class="videos">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/CwHoKErDdDU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/X5Dd78jiSi8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
   
   
		
    </main>

        
    




    
    <footer>           
    
     <h3>Follow us on</h3>
     <div id="social-media-footer">
        <ul>
         <li>
          <a href="https://www.facebook.com/Genshinimpact/">
          <i class="fab fa-facebook"></i>
          </a>
         </li>
         <li>
          <a href="https://www.youtube.com/c/GenshinImpact">
          <i class="fab fa-youtube"></i>
          </a>
         </li>
         <li>
          <a href="https://discord.com/invite/genshinimpact">
          <i class="fab fa-discord"></i>
          </a>
         </li>
         <li>
          <a href="https://www.reddit.com/r/Genshin_Impact/">
          <i class="fab fa-reddit"></i>
          </a>
         </li>
        </ul>
      </div>
            
        </footer>           

        <script src="script.js"></script>
</body>
</html>


<!-- reference: https://www.youtube.com/watch?v=eJWMM189mB0&list=PL0-e1OMq5RP4LVmPKRljF5vAU3-Jx3yWQ&index=3 -->
<!-- https://www.w3schools.com/howto/howto_js_slideshow_gallery.asp -->
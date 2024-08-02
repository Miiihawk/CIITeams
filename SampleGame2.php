<?php
session_start();
include('config.php');


if(isset($_GET['GameID'])){

    $GameID = $_GET['GameID'];
 
     $stmt = $con -> prepare("SELECT * FROM games WHERE GameID= ?");
     $stmt -> bind_param("i",$GameID);

     $stmt->execute();

     $Game = $stmt -> get_result();



}else{
    header('location:Home.php');
}


if(!isset($_SESSION["valid"])){
    header("Login.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Home.css">
    <title>Game</title>

    <!--boxiconss-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"/>

    <!--slidesss-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>
<body>
    
<section id="header" class="header">   
        <a href="#" class="logo"> <img class="logoimg" src="imgs/Logo.png" alt="CIITeams"> CIITeams</a>
        
        <div>
            <ul id="navbar">
                 <li class="home"><a href="Home2.php">Home</a></li>
                 <li class="about"><a href="#">About</a></li>
                 <li class="support"><a href="#">Support</a></li>
                </ul>
            </div>  
            
            <?php 
            
            $user_id = $_SESSION["user_id"];
            $query = mysqli_query($con, "SELECT * FROM users WHERE user_id = $user_id");
            
            while($result = mysqli_fetch_assoc($query)){
                $res_username = $result["username"];
                $res_password = $result["password"];
                $res_user_id = $result["user_id"];
            
            }
            ?>
            
            <ul id="navbar2">
                Username: <?php echo $res_username ?> <li> <a href="Edit.php"> <i class='bx bxs-user-circle'> </i></a></li>
                <li> <a class="Dis" href="Home2.php">Discover</a></li>
                <li> <a class="Bro" href="Browse2.php">Browse </a></li>
                <li> <a class="Find" href="#">Find a CIITzen</a></li>
                <a id="close"><i class='bx bx-x'></i></a>
            </ul>
            
            <div id="mobile">
                <i id="bar" class='bx bx-menu'></i>
            </div>
    </section>





 <?php while($row = $Game -> fetch_assoc()){?>

    <section id="prodetails" class="section-p1">
 
        <div class="single-pro-image">
            <div style="--swiper-navigation-color: #3204ff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <img src="<?php echo $row['image1']; ?>" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo $row['image2']; ?>" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo $row['image3']; ?>" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo $row['image4']; ?>" />
                  </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>

              <div thumbsSlider="" class="swiper mySwiper3">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <img src="<?php echo $row['image1']; ?>" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo $row['image2']; ?>"/>
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo $row['image3']; ?>" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo $row['image4']; ?>" /> 
                  </div>
                </div>
              </div>
            </div>

        

            <div class="single-pro-details">
                <h4><?php echo $row['game_name']; ?></h4>
                <h2>Php <?php echo $row['price']; ?></h2>
                <a href="<?php echo $row['download_link']; ?>" class="normal"><button type="button" class="normal">Play Now</button></a>
                <p>Developer:</p>
                <p><?php echo $row['developer']; ?></p>
                <p>Release Date: <span><?php echo $row['release_date']; ?></span></p>
            
            </div>

        </div> 
    </section>

    <section class="details">

                

                <h4>Details:</h4>
                <span>
                <?php echo $row['game_description']; ?>
               </span>

                  
    </section>
<?php } ?>  

<section id="products"  class="section-p1" >

        <h2>Featured Games</h2>

        <div class="container"> 

            <?php include('php/featured_products.php'); ?>

            <?php while ($raw = $featured_products->fetch_assoc()): ?>
                <!-- Your HTML code for displaying each featured product -->
                <div class="pro">
                    <a href="<?php echo "SampleGame2.php?GameID=". $raw['GameID'];?>"> 
                        <img src="<?php echo $raw['display_image']; ?>" alt="prod1">  
                   
                    
                    <div class="des">
                        <h5><?php echo $raw['game_name']; ?></h5>
                        <h4>Php<?php echo $raw['price']; ?></h4>
                    </div>
                </a>
                </div>
                
            <?php endwhile; ?>
        </div>

</section>

    

<footer class="section-p1">
        <div class="col">
            <h4>Contact</h4>
            <p><strong>Address: </strong></p>
            <p><strong>Phone: </strong>+63 977 0353 781</p>
            <p><strong>Email: </strong></p>
            <p> keith.perdido@ciit.edu.ph <br>david.wagan.ciit.edu.ph <br> kurt.magsino@ciit.edu.ph</p>
        </div>
       
        </div>

        <div class="col about">
            <h4>About</h4>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact Us</a>
        </div>
        
        <div class="follow">
            <h4>Follow us</h4>
            <div class="icon">
                <i class='bx bxl-facebook-circle'></i>
                <i class='bx bxl-instagram' ></i>
                <i class='bx bxl-tiktok' ></i>
            </div>


        <div class="copyright">
            <p>© 2024 CIITeams. All Rights Reserved.</p>
        </div>

</footer>


   
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="Home.js"></script>
    

</body>
</html>
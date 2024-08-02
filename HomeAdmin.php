<?php 

session_start();
include("config.php");
if(!isset($_SESSION["valid"])){
    header("Login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>CIITeams</title>

        <!--custom css-->
        <link rel="stylesheet" href="Home.css">
        
        <!--boxiconss-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"/>

        <!--slidesss-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    </head>

    <body>

    <section id="header" class="header">   
        <a href="HomeAdmin.php" class="logo"> <img class="logoimg" src="imgs/Logo.png" alt="CIITeams"> CIITeams</a>
        
        <div>
            <ul id="navbar">
                 <li class="home"><a href="Home.html">Home</a></li>
                 <li class="about"><a href="#">About</a></li>
                 <li class="support"><a href="#">Support</a></li>
                </ul>
            </div>  
            
            <?php 

            $admin_id = $_SESSION["admin_id"];
            $query = mysqli_query($con, "SELECT * FROM admins WHERE admin_id = $admin_id");

            while($result = mysqli_fetch_assoc($query)){
                $res_admin = $result["admin_username"];
                $res_password = $result["password"];
                $res_admin_id = $result["admin_id"];
            }
            ?>
            
            <ul id="navbar2">
                Username: <?php echo $res_admin ?> <li> <a href="AdminEdit.php"> <i class='bx bxs-user-circle'> </i></a></li>
                <li> <a class="Dis" href="HomeAdmin.php">Discover</a></li>
                <li> <a class="Bro" href="Browse.php">Browse </a></li>
                <li> <a class="Find" href="#">Find a CIITzen</a></li>
                <a id="close"><i class='bx bx-x'></i></a>
            </ul>
            
            <div id="mobile">
                <i id="bar" class='bx bx-menu'></i>
            </div>
    </section>



    <!--Slider Banner-->
    <section class="first">
            
        <div class="swiper mySwiper">
                
                <div class="swiper-wrapper">
                    
                    <!--movie 1-->
                    <div class="swiper-slide">

                        <img src="imgs/Palworld.png"/>

                        <div class="text">
                            <span>Play Now </span>
                            <h1>Palworld</h1>
                            
                        </div>

                    </div>
                    
                    <!--movie 2-->
                    <div class="swiper-slide">

                        <img src="imgs/Elden.jpg" />
                        
                        <div class="text">
                            <span>Play Now </span>
                            <h1>Elden Ring</h1>
                            
                        </div>

                    </div>
                    
                    <!--movie 3-->
                    <div class="swiper-slide">

                        <img src="imgs/GTA5.jpg" />

                        <div class="text">
                            <span>Play Now </span>
                            <h1>GTA V</h1>
                            
                        </div>

                    </div>

                    <!--movie 4-->
                    <div class="swiper-slide">

                        <img src="imgs/DBD.jpg" />

                        <div class="text">
                            <span>Play Now </span>
                            <h1>Dead by Daylight</h1>
                            
                        </div>

                    </div>

                    <!--movie 5-->
                    <div class="swiper-slide">

                        <img src="imgs/pubg.jpg" />

                        <div class="text">
                            <span>Play Now </span>
                            <h1>PUBG:Battlegrounds</h1>
                            
                        </div>

                    </div>

                </div>
                <!--for page slides-->
               
            
            </div>

    </section>

    <!--Featured Games-->
    <section id="products"  class="section-p1" >

        <h2>Featured Games</h2>

        <div class="container"> 

            <?php include('php/featured_products.php'); ?>

            <?php while ($raw = $featured_products->fetch_assoc()): ?>
                <!-- Your HTML code for displaying each featured product -->
                <div class="pro">
                    <a href="Product1.html"> 
                        <img src="<?php echo $raw['display_image']; ?>" alt="prod1">  
                    </a>
                    
                    <div class="des">
                        <h5><?php echo $raw['game_name']; ?></h5>
                        <h4>Php<?php echo $raw['price']; ?></h4>
                    </div>
                </div>
                
            <?php endwhile; ?>
        </div>

    </section>


    <!--First Person shooter Games-->
    <section class="shoot  section-p1 " id="shoot">
        
        <h4 class="heading">Free Games</h2>
        
            <!--container-->
            <div class="shoot-container swiper">
                
                <div class="swiper-wrapper">

                    <!--box1-->

                    <?php include('php/freegames.php'); ?>
                    
                    <?php while ($raw = $free->fetch_assoc()): ?>



                    <div class="swiper-slide box">
                    
                        <div class="box-img">
                            <a href="<?php echo "SampleGame.php?GameID=". $raw['GameID'];?>"> <img src="<?php echo $raw['display_image']; ?>"/></a> 
                        </div>

                        <div class="box-content">
                            <h3><?php echo $raw['game_name']; ?></h3>
                            <span>Php<?php echo $raw['price']; ?></span>
                        </div> 
                    

                    </div>
                   

                 <?php endwhile; ?>
               </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                

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


    <!--Javascriptt-->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="Home.js"></script>

    </body>

</html>
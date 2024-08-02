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
    <link rel="stylesheet" href="Home.css">
    <title>Shop</title>

    <!--boxiconss-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"/>

    <!--slidesss-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>
<body>

<section id="header" class="header">   
        <a href="Home2.php" class="logo"> <img class="logoimg" src="imgs/Logo.png" alt="CIITeams"> CIITeams</a>
        
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
                <li> <a class="Bro" href="Browse2.html">Browse </a></li>
                <li> <a class="Find" href="#">Find a CIITzen</a></li>
                <a id="close"><i class='bx bx-x'></i></a>
            </ul>
            
            <div id="mobile">
                <i id="bar" class='bx bx-menu'></i>
            </div>
</section>

<section id="products"  class="section-p1" >
    <h2>Featured Games</h2>
    
    <div class="container"> 
        
    <?php include('php/Bgames.php'); ?>
    
    <?php while ($raw = $gamer->fetch_assoc()): ?>
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
            <p> keith.perdido@ciit.edu.ph <br>david.wagan.ciit.edu.ph</p>
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIITeams Sign Up</title>
    <link rel="stylesheet" href="Home.css">
    <link rel="stylesheet" href="logandsign.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"/>
</head>

<body>

<header class="logo">
    <a href="HomeAdmin.php" class="logo">
        <img class="logoimg" src="Logo.png" alt="CIITeams"> CIITeams
    </a>
</header>
<div class="container">
    <div class="box form-box">

    <?php
include("config.php");

if(isset($_POST["submit"])) {
    $game_name = $_POST["game_name"];
    $release_date = $_POST["release_date"];
    $developer = $_POST["developer"];
    $price = $_POST["price"];
    $game_description = $_POST["game_description"];
    $display_image = $_POST["display_image"];
    $image1 = $_POST["panel_image1"];
    $image2 = $_POST["panel_image2"];
    $image3 = $_POST["panel_image3"];
    $image4 = $_POST["panel_image4"];
    $genre = $_POST["genre"];
    $download_link = $_POST["download_link"];

    if (!empty($game_name) && !empty($release_date) && !empty($developer) && !empty($price) && !empty($game_description) && !empty($display_image) && !empty($image1) && !empty($image2) && !empty($image3) && !empty($image4) && !empty($genre) && !empty($download_link)) {
        
        
        // Prepare and bind SQL statement
        $stmt = $con->prepare("INSERT INTO games (game_name, release_date, developer, price, game_description, display_image, image1, image2, image3, image4, genre, download_link) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssss", $game_name, $release_date, $developer, $price, $game_description, $display_image, $image1, $image2, $image3, $image4, $genre, $download_link);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "<div class='message'><p>Game uploaded</p></div><br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "<div class='message'><p>All fields are required</p></div><br>";
        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
    }
} else {
    // Your HTML form code goes here
?>



        <h3>
            Sign Up to CIITeams
        </h3>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="field input">
                <label for="Game_Name">Game Name</label>
                <input type="text" name="game_name" id="game_name" autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="Release_Date">Release Date</label>
                <input type="date" name="release_date" id="release_date" autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="Developer">Developer</label>
                <input type="text" name="developer" id="developer" autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="Price">Price</label>
                <input type="text" name="price" id="price" autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="Game_Description">Game Description</label>
                <input type="text" name="game_description" id="game_description" autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="displayImage">Name of Display Image</label>
                <input type="text" name="display_image" id="display_image"  value="imgs/disp/"  autocomplete="off" required >
            </div>

            <div class="field input">
                <label for="panelImage1"> Name of Image 1</label>
                <input type="text" name="panel_image1" id="panel_image1" value="imgs/Pro/" autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="panelImage2"> Name of Image 2</label>
                <input type="text" name="panel_image2" id="panel_image2" value="imgs/Pro/" autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="panelImage3">Name of Image 3</label>
                <input type="text" name="panel_image3" id="panel_image3" value="imgs/Pro/"  autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="panelImage4">Name of Image 4</label>
                <input type="text" name="panel_image4" id="panel_image4" value="imgs/Pro/"  autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="Genre">Genre</label>
                <input type="text" name="genre" id="genre" autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="Download_Link">Download Link</label>
                <input type="text" name="download_link" id="download_link" autocomplete="off" required>
            </div>

            <div class="field">
                <input type="submit" class="btn" name="submit" value="Submit">
            </div>

        </form>
    </div>
    <?php } ?>
</div>

<script src="Home.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</body>
</html>

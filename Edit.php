<?php 

session_start();

include("config.php");

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user_id = $_SESSION['user_id'];

    $edit_query = mysqli_query($con,"UPDATE users SET username = '$username', password = '$password' WHERE user_id = '$user_id' ") or die ("Error");

    if($edit_query){
        echo "<div class = 'message'>
        <p> Edit Successful </p>
        </div> <br>";

        echo"<a href='Home2.php'><button class='btn'>Go Back</button></a>";
    }

} else if(isset($_POST['delete'])){
    $user_id = $_SESSION['user_id'];

    $delete_query = mysqli_query($con,"DELETE FROM users WHERE user_id = '$user_id' ") or die ("Error");

    if($delete_query){
        session_destroy();
        header("Location: Home.php");
        exit;
    }

} else {
    $user_id = $_SESSION['user_id'];
    $query = mysqli_query($con, "SELECT * FROM users WHERE user_id = $user_id");

    while($result = mysqli_fetch_assoc($query)){
        $res_username = $result["username"];
        $res_password = $result["password"];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIITeams Edit Profile</title>
    <link rel="stylesheet" href="Home.css">
    <link rel="stylesheet" href="logandsign.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"/>
</head>

<body>
    <header class="logo">
        <a href="Home.php" class="logo">
            <img class="logoimg" src="Logo.png" alt="CIITeams"> CIITeams
            <a href="Home.php"> <button class="btn">Log Out</button> </a>
        </a>
    </header>
    <div class="container">
        <div class="box form-box">

            <h3>Edit Profile</h3>
            <br>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Edit Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_username; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Edit Password</label>
                    <input type="text" name="password" id="password" value="<?php echo $res_password; ?>" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Edit" required>
                    <input type="submit" class="btn delete-btn" name="delete" value="Delete Account" required>
                </div>
            </form>
        </div>
    </div>

    <script src="Home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>

<?php } ?>

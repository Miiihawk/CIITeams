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
        <a href="Home.php" class="logo">
            <img class="logoimg" src="Logo.png" alt="CIITeams"> CIITeams
        </a>
    </header>
    <div class="container">
        <div class="box form-box">


        <?php 
        
       include("config.php");
        if(isset($_POST["submit"])){
            $username = $_POST["username"];
            $first_name = $_POST["firstname"];
            $last_name = $_POST["lastname"];
            $email = $_POST["email"];
            $birthday = $_POST["birthday"];
            $password = $_POST["password"];

        $verify_query = mysqli_query($con, "SELECT email FROM users WHERE email = '$email'");

        if (mysqli_num_rows($verify_query) !=0 ){
                echo "<div class = 'message'>
                <p>This email is used, Try another email. </p>
                </div> <br>";
                echo"<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
        } 
        else {
            mysqli_query($con, "INSERT INTO users (username, first_name, last_name, email, birthday, password) VALUES ('$username', '$first_name', '$last_name', '$email', '$birthday', '$password')") or die("Error Occurred");
                echo "<div class = 'message'>
                <p>Registration Successful</p>
                </div> <br>";

                echo"<a href='Login.php'><button class='btn'>Login Now</button>";
        }
        

    } else {


        ?>


            <h3>
                Sign Up to CIITeams
            </h3>
            <br>
                <form action = "" method="post">
                    <div class="field input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" id="firstname" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" id="lastname" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="email">CIIT Email</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="birthday">Birthday</label>
                        <input type="date" name="birthday" id="birthday" required>
                    </div>

                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Submit" required>
                    </div>

                    <div class="links">Already have an account? <a class="signup" href="Login.php"> Login </a>
                    </div>

                </form>
            </header>
        </div>
        <?php } ?>
    </div>

    <script src="Home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


</body>
</html>
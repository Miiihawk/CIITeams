<?php

session_start();

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIITeams Login</title>
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

            if (isset($_POST['submit'])) {
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password = mysqli_real_escape_string($con, $_POST['password']);

                
                $admin_query = mysqli_query($con, "SELECT * FROM admins WHERE admin_email = '$email' AND password = '$password'") or die("Error");
                $admin_row = mysqli_fetch_assoc($admin_query);

                if ($admin_row) {
                    
                    $_SESSION['admin_id'] = $admin_row['admin_id'];
                    $_SESSION['valid'] = $admin_row['admin_email'];
                    $_SESSION['valid'] = $admin_row['password'];



                    
                    header("Location: HomeAdmin.php");
                    exit();
                }

                
                $user_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND password = '$password'") or die("Error");
                $user_row = mysqli_fetch_assoc($user_query);

                if ($user_row) {
                
                    $_SESSION['user_id'] = $user_row['user_id'];
                    $_SESSION['username'] = $user_row['username'];
                    $_SESSION['first_name'] = $user_row['first_name'];
                    $_SESSION['last_name'] = $user_row['last_name'];
                    $_SESSION['birthday'] = $user_row['birthday'];
                    $_SESSION['valid'] = $user_row['email'];

                    
                    header("Location: Home2.php");
                    exit();
                } else {
                    $error_message = "Wrong Username or Password";
                }
            }
            ?>
            <h3>
                Login to CIITeams
            </h3>
            <br>
                <form action = "" method="post">
                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Login" required>
                    </div>

                    <div class="links">Don't have an account? <a class="signup" href="SignUp.php"> Sign Up </a>
                    </div>

                </form>
            </header>
        </div>
        <?php if(isset($error_message)) { ?>
                    <div class='message'>
                    <p><?php echo $error_message; ?></p>
                    </div>
                    <br>
                <a href='Login.php'><button class='btn'>Go Back</button></a>
                <?php } ?>
    </div>

    <script src="Home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


</body>
</html>

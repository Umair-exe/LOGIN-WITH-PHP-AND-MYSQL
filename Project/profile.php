<?php
session_start();
require("connection.php");

if (!isset($_SESSION['loggedIn'])) {
    header("location:index.php?message=Login First!");
}



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <style>
        .anchor {
            text-decoration: none;
            font-size: 54px;
            color: black;
        }

        button:hover,
        .anchor:hover {
            opacity: 0.7;
        }

        .button {
            padding: 15px;
            background-color: #3d3d3d;
            color: white;
            border: none;
            text-decoration: none;
        }

        .button:hover {
            background-color: wheat;
            color: black;
        }
    </style>

</head>

<body>
    <div class="header1">
        <div class="logo">
            <a href="home.php">
                <h1 style="font-size: 25px;padding-left:50px; color:white;font-weight:bold;">LOGO</h1>
            </a>
        </div>
        <div class="side">
            <a href="home.php" style="margin-right:30px;"><i class="fa fa-home"></i>Home</a>
            <a href="logout.php" style="margin-right:30px;"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>

    </div>

    <div style="display: flex; justify-content:space-between;padding:10px; padding-left:40px">
        <div>
            <h1 style="font-size: 25px; color:gray">Profile Page</h1>
        </div>
        <div style="padding-right: 40px;padding:10px; ">
            <a class="button" href="editProfile.php"><i class="fa fa-gear"></i> Edit Profile</a>
        </div>
    </div>
    <hr>
    <div class="info">
        <div style="text-align:center">
            <img style="width:100%;height:400px" src="<?php echo $_SESSION['imagename'] ?>">
            <h2 style="font-family: sans-serif; font-weight:lighter;"><?php echo  $_SESSION['name']; ?></h2>
            <h2>Username: <?php echo  "  " . $_SESSION['username']; ?></i></h2>
            <div style="margin: 24px 0;">
                <a class="anchor" href="#"><i style=" font-size: 30px;" class="fab fa-linkedin"></i></a>
                <a class="anchor" href="#"><i style=" font-size: 30px;" class="fab fa-instagram"></i></a>
                <a class="anchor" href="#"><i style=" font-size: 30px;" class="fab fa-pinterest-p"></i></a>
                <a class="anchor" href="#"><i style=" font-size: 30px;" class="fab fa-facebook"></i></a>
            </div>

        </div>
    </div>




</body>

</html>
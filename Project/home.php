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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <style>


    </style>

</head>

<body>
    <div class="header1">
        <div class="logo">
            <h1 style="font-size: 25px;padding-left:50px; color:white;font-weight:bold;">LOGO</h1>
        </div>
        <div class="side">
            <a href="profile.php" style="margin-right:30px;"><i class="fas fa-user-circle"></i>Profile</a>
            <a href="logout.php" style="margin-right:30px;"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>

    </div>

    <div class="banner">
        <div>
            <h1 style="font-size: 25px; color:gray">Home Page</h1>
        </div>
        <hr>
        <h2 style="font-size: 35px; font-weight:bold; color:gray;">Welcome <?php echo $_SESSION['name']; ?></h2>
    </div>



</body>

</html>
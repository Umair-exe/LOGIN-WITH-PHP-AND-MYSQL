<?php
session_start();
require("connection.php");

$username = $_SESSION['username'];

if (!isset($_SESSION['loggedIn'])) {
    header('location:index.php?message=Login First!');
}

$query = ("SELECT * FROM users WHERE username='$username'");
$result = mysqli_fetch_array(mysqli_query($conn, $query));

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $usernameNew = $_POST['username'];
    $password = $_POST['password'];

    if ($usernameNew == $username) {
        header("location:editProfile.php?Message=You are entering your current username");
    } else {

        $query = "UPDATE users set fname='$fname',lname='$lname',email='$email',username='$usernameNew',password='$password' where username='$username'";
        $res = mysqli_query($conn, $query);

        if ($res) {
            header("location:logout.php");
        } else {
            echo "<b>Data not updated!</b>";
        }
    }
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
        .button {
            padding: 15px;
            background-color: #3d3d3d;
            color: white;
            border: none;
            text-decoration: none;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .button:hover {
            background-color: wheat;
            color: black;
        }

        .updatebtn {
            padding: 15px;
            background-color: #3d3d3d;
            color: white;
            border: none;
            width: 100%;
            text-decoration: none;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .updatebtn:hover {
            background-color: wheat;
            color: black;
        }

        .row {
            display: flex;
            flex-wrap: wrap;

        }

        .flex1 {
            flex: 30%;
            padding: 40px;
            background-color: whitesmoke;


        }

        .flex2 {
            flex: 60%;
            padding: 20px 40px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }

        form input[type="password"],
        form input[type="text"],
        form input[type="email"],
        form input[type="date"] {
            width: 100%;
            height: 50px;
            border: 1px solid #dee0e4;
            margin-bottom: 20px;
            padding: 0 15px;
        }

        form input[type="submit"] {
            width: 24%;
            padding: 15px;
            margin: 3px;
            background-color: #3d3d3d;
            border: 0;
            cursor: pointer;
            font-weight: bold;
            color: #ffffff;
            margin-top: 10px;
            transition: background-color 0.2s;
        }

        form input[type="submit"]:hover,
        form input[type="button"]:hover {
            box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
            transition: background-color 0.2s;
            background-color: wheat;
            color: black;
        }

        img {
            display: block;
            border-radius: 50%;
            margin-left: auto;
            margin-right: auto;
            width: 70%;
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
            <a href="profile.php" style="margin-right:30px;"><i class="fas fa-user-circle"></i>Profile</a>
            <a href="logout.php" style="margin-right:30px;"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>

    </div>
    <div style="display: flex; justify-content:space-between;padding:10px; padding-left:40px">
        <div>
            <h1 style="font-size: 25px; color:gray">Profile Settings</h1>
        </div>
        <div style="padding-right: 40px;padding:10px; ">
            <button class="button" onclick="deleteAccount()">Delete Account</button>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="flex1">
            <div style=" font-style:italic; text-align:center; padding:20px;">
                <?php
                if (isset($_GET["message"])) {
                    echo '<div style="background-color: #3d3d3d; border-radius:4px;color:white; padding:20px; ">
                        <strong>message!</strong> ' . $_GET["message"] . '
                    </div>
                ';
                }
                ?></div>
            <img src="<?php echo $_SESSION['imagename']; ?>" alt="profile image">
            <form method="POST" action="fileupload.php" enctype="multipart/form-data">
                <input type="file" style="padding-top: 20px;" name="uploadfile" value="" />

                <div style="text-align:center; padding:25px;">
                    <button class="button" type="submit" name="upload">Change Image</button>
                </div>
            </form>

        </div>
        <div class="flex2">
            <div style=" font-style:italic; text-align:center; padding:20px;">
                <?php
                if (isset($_GET["Message"])) {
                    echo '<div style="background-color: #3d3d3d; border-radius:4px;color:white; padding:20px; ">
                        <strong>message!</strong> ' . $_GET["Message"] . '
                    </div>
                ';
                }
                ?></div>
            <h1 style="font-size: 25px; color:gray">Your Details</h1>


            <form action="" method="POST">
                <label>First Name :</label>
                <input type="text" name="fname" placeholder="Enter first name" autocomplete="off" value="<?php echo $result['fname']; ?>" id="fname" required>
                <label>Last Name :</label>
                <input type="text" name="lname" placeholder="Enter last name" autocomplete="off" value="<?php echo $result['lname']; ?>" id="lname" required>
                <label>Email :</label>
                <input type="email" name="email" placeholder="Enter Email" value="<?php echo $result['email']; ?>" id="email" required>
                <label>Username:</label>
                <input type="text" name="username" placeholder="Username" autocomplete="off" value="<?php echo $result['username']; ?>" id="username" required>
                <label>Password :</label>
                <input type="text" name="password" placeholder="Password" value="<?php echo $result['password']; ?>" id="password" required>
                <button type="submit" class="updatebtn" name="submit" class="create">Update</button>
            </form>


        </div>
    </div>

</body>

<script>
    function deleteAccount() {
        var a = confirm("Do you really want to delete your Account!");
        if (a) {
            window.location.href = "deleteAccount.php";
        } else {
            window.location.href = "profile.php";
        }

    }
</script>

</html>
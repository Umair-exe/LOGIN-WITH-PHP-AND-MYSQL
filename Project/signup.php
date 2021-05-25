<?php
require("connection.php");

if (isset($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['username'], $_POST['password'], $_POST['date1'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $date = $_POST['date1'];

    $query = "INSERT INTO users(username,password,email,ddate,fname,lname) values('$username','$password','$email','$date','$fname','$lname')";


    if ($stmt = $conn->prepare('SELECT id,username from users where username=?')) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            header('location:signup.php?message=User Already exist!');
        } else {

            if(strlen($password)>=8) {
                if (mysqli_query($conn, $query)) {
                    header("location:index.php?message= Account Created Successfully!");
                } else {
                    echo "Account not Created!</br>";
                }
            }
            else {
                header("location:signup.php?message=password is too short must be 8 character long!");
            }
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
        
        .login {
            width: 400px;
            background-color: #ffffff;
            box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
            margin: 100px auto;
        }

        .login h1 {
            text-align: center;
            color: #5b6574;
            font-size: 24px;
            padding: 20px 0 20px 0;
            border-bottom: 1px solid #dee0e4;
        }

        .login form {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding-top: 20px;
        }

        .login form label {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            background-color: #3d3d3d;
            color: #ffffff;
        }

        .login form input[type="password"],
        .login form input[type="text"],
        .login form input[type="email"]  {
            width: 310px;
            height: 50px;
            border: 1px solid #dee0e4;
            margin-bottom: 20px;
            padding: 0 15px;
        }

        .login form input[type="submit"],
        .login form input[type="button"] {

            padding: 15px;
            margin-top: 10px;
            margin:3px;
            background-color: #3d3d3d;
            border: 0;
            cursor: pointer;
            font-weight: bold;
            color: #ffffff;
            transition: background-color 0.2s;
        }

        .login form input[type="submit"]:hover,
        .login form input[type="button"]:hover {
            background-color: wheat;
            color: black;
            transition: background-color 0.2s;
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
            <a href="index.php" style="margin-right:30px;"><i class="fas fa-user-circle"></i>Sign In</a>
        </div>

    </div>
    <div class="login">
        <h1>Create Account</h1>
        <form action="" method="post">

            <input type="text" name="fname" placeholder="Enter first name" autocomplete="off" id="fname" required>

            <input type="text" name="lname" placeholder="Enter last name" autocomplete="off" id="lname" required>
            <input type="email" name="email" placeholder="Enter Email" id="email" required>
            <input type="text" name="username" placeholder="Username" autocomplete="off" id="username" required>
            <input type="text" name="date1" placeholder="YYYY-MM-DD" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" title="Enter a date in this formart YYYY-MM-DD" />
            <input type="password" name="password" placeholder="Password" id="password" required>
            <div style=" font-style:italic; text-align:center; padding:10px 10px ;">
                <?php
                if (isset($_GET["message"])) {
                    echo '<div style="background-color:red;color:white; padding: 10px;"">
                        <strong>message!</strong> ' . $_GET["message"] . '
                    </div>
                ';
                }
                ?></div>
            <button type="submit" class="create">Create Account</button>
        </form>
    </div>
</body>

</html>
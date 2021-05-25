<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .anchor {
            text-decoration: none;
            font-size: 10px;
            color: black;
        }

        button:hover,
        .anchor:hover {
            opacity: 0.7;
        }

        .login {
            width: 400px;
            border-radius: 10px;
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
        .login form input[type="text"] {
            width: 310px;
            height: 50px;
            border: 1px solid #dee0e4;
            margin-bottom: 20px;
            padding: 0 15px;
        }

        .login form input[type="submit"],
        .login form input[type="button"] {

            padding: 12px 32px;
            margin-top: 10px;
            margin: 2px;
            background-color: #3d3d3d;
            border: 0;
            text-decoration: none;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            font-weight: bold;
            color: #ffffff;
        }

        .login form input[type="submit"]:hover,
        .login form input[type="button"]:hover {
            background-color: wheat;
            color: black;

        }
    </style>
</head>

<body>
    <div style="display: flex;padding:0px;  justify-content:space-between;padding-left:50px" class="header">
        <h1 style="font-size: 25px; margin:20px; color:white;font-weight:bold;">LOGO</h1>
        <div style="margin: 24px 0; padding-right:50px">
            <a class="anchor" href="#"><i style="color:white; font-size: 30px;" class="fab fa-linkedin"></i></a>
            <a class="anchor" href="#"><i style="color:white; font-size: 30px;" class="fab fa-instagram"></i></a>
            <a class="anchor" href="#"><i style="color:white; font-size: 30px;" class="fab fa-pinterest-p"></i></a>
            <a class="anchor" href="#"><i style="color:white; font-size: 30px;" class="fab fa-facebook"></i></a>
        </div>
    </div>
    <div class="login">
        <h1 style="font-size: 25px; font-weight:bold; color:gray"> Login</h1>
        <form action="auth.php" method="POST">
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" autocomplete="off" placeholder="Username" id="username" required>
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="Password" id="password" required>
            <div style="display: flex;justify-content:center; padding-left:20px;">
                <input type="submit" value="Sign In">
                <a href="signup.php"><input type="button" value="Sign Up"></a>
            </div>
            <div style=" font-style:italic; text-align:center; padding:10px 10px ;">
                <?php
                if (isset($_GET["message"])) {
                    echo '<div class="alert alert-danger alert-dismissible">
                        <strong>message!</strong> ' . $_GET["message"] . '
                    </div>
                ';
                }
                ?></div>
        </form>

    </div>
</body>

</html>
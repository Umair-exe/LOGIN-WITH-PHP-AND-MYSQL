<?php
session_start();
require("connection.php");

$username = $_SESSION['username'];

if(!isset($_SESSION['loggedIn'])) {
    header('location:index.php');
}

$query="DELETE FROM users where username='$username'";
if(mysqli_query($conn,$query)){
    session_destroy();
    header('location:index.php?message=Account Deleted!');
}
else {
    echo "account not deleted!";
}
?>
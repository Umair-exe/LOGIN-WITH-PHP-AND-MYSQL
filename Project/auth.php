<?php
session_start();
require("connection.php");


if($stmt=$conn->prepare('SELECT id,password,fname,lname,imagename from users where username=?')){
    $stmt->bind_param('s',$_POST['username']);
    $stmt->execute();
    $stmt->store_result();


   if($stmt->num_rows >= 0) {
        $stmt->bind_result($id,$password,$fname,$lname,$imagename);
        $stmt->fetch();


        if($_POST['password']==$password){
            session_regenerate_id();
            $_SESSION['loggedIn']=true;
            $_SESSION['username']=$_POST['username'];
            $_SESSION['id']=$id;
            $_SESSION['password']=$password;
            $_SESSION['name']=$fname. " " . $lname;
            $_SESSION['imagename']=$imagename;

            header("location:home.php");
    
        }
        else{
           
            header("location:index.php?message=incorrect Username And Password!");
        }
        $stmt->close();
    }
}
else{
    echo "incorrect username and password!<br>";
}

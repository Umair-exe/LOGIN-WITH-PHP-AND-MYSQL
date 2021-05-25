<?php
session_start();
require("connection.php");

$file_name = $_FILES['uploadfile']['name'];
$tmpname = $_FILES['uploadfile']['tmp_name'];
$size = $_FILES['uploadfile']['size'];
$folder = "images/";
$file_type = $_FILES['uploadfile']['type'];
$targetfile = $folder . basename($file_name);

$file_type = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));
$flag = 1;

$id = $_SESSION['id'];

/*if (file_exists($targetfile)) {
    echo "file already exist<br>";
    $flag = 0;
}*/
if ($size > 5000000) {
    echo "file size is too large!<br>";
} else {

    if ($file_type == 'jpeg') {
        $query = "UPDATE users SET imagename='$targetfile' where id='$id'";

        $res = mysqli_query($conn, $query);
    } else {
        echo "Sorry, only JPEG files are allowed.";
        $flag = 0;
    }
}
if ($flag) {
    move_uploaded_file($tmpname, $targetfile);
    $_SESSION['imagename']=$targetfile;
    header('location:editProfile.php?message=imageUpdated!');
} else {
    echo "file not uploaded!";
}

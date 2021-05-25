<?php
$conn=mysqli_connect("localhost","root","","weblab");

if(!$conn) {
    die ("database could not be connected!" . mysqli_connect_errno());
}
<?php
$server="db";
$username="Travvora";
$password="trav123";

$con=mysqli_connect($server,$username,$password);

if(!$con){
    die("connection failed".mysqli_connect_error());
}

$name=$_POST['user'];
$email=$_POST['email'];
$password=$_POST['password'];
$sql="INSERT INTO `hotel`.`user`(`name`,`email`,`password`) VALUES ('$name','$email','$password');";
if($con->query($sql)==true){
    header("Location: login.html");
} else {
    echo "Error: $con->error";
}

$con->close();

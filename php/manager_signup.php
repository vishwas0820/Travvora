<?php
$server="db";
$username="Travvora";
$password="trav123";

$con=mysqli_connect($server,$username,$password);

if(!$con){
    die("connection failed".mysqli_connect_error());
}

$name=$_POST['hotel'];
$email=$_POST['email'];
$password=$_POST['password'];
$sql="INSERT INTO `hotel`.`manager`(`hotel`,`email`,`password`) VALUES ('$name','$email','$password');";
if($con->query($sql)==true){
    header("Location: login_manager.html");
} else {
    echo '<script type="text/javascript">alert("Failed");window.location = "user.php";</script>';
}

$con->close();
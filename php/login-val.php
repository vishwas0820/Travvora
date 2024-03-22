<?php
session_start();
$server="db";
$username="Travvora";
$password="trav123";
$db="hotel";

$con=mysqli_connect($server,$username,$password,$db);

if(!$con){
    die("connection failed".mysqli_connect_error());
}

if(isset($_POST['user']) && isset($_POST['password'])){
  function validate($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
  }
}

$uname=validate($_POST['user']);
$pass=validate($_POST['password']);

$sql="SELECT * FROM user WHERE email='$uname' AND password='$pass'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)===1){
  $row=mysqli_fetch_assoc($result);
  if($row['email']===$uname && $row['password']===$pass){
    $_SESSION['email']=$row['email'];
    $_SESSION['name']=$row['name'];
    $_SESSION['uid']=$row['id'];
    header("Location: user.php");
  } else {
    echo '<script type="text/javascript">alert("Failed");</script>';
  }
} else {
  echo '<script type="text/javascript">alert("Invalid Email and Password");window.location = "Home.html";</script>';
}
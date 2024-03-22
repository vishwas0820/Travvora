<?php
session_start();
include "db_conn.php";
if(isset($_POST["name"])){
  $id=$_SESSION['uid'];
  $name=$_POST["name"];
  $email=$_POST["uemail"];
  $hotel=$_POST["email"];
  $purpose=$_POST["pur"];
  $sql="INSERT INTO `contactus` VALUES ('$id','$name','$email','$hotel','$purpose');";
  if($con->query($sql)==true){
    echo '<script type="text/javascript">alert("Success");window.location = "user.php";</script>';
  } else {
    echo '<script type="text/javascript">alert("Failed");window.location = "user.php";</script>';
  }

  $con->close();
}

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Contact Us</title>
  <link rel="stylesheet" href="css/spa.css" />
  <link rel="stylesheet" href="css/footer.css" />
</head>
<body>
    <div class="detail">
        <h1>Contact Us</h1>
    </div>
    <table>
      <tr>
    <td><div class="card">
      <img src="img/bangalore.jpg" alt="Avatar" style="width:300px;height: 300px;">
      <div class="container">
        <h4><b>Bangalore</b></h4>
        <p>Email: oberoibangalore@gmail.com</p>
      </div>
    </div></td>
    <td><div class="card">
      <img src="img/goa.jpg" alt="Avatar" style="width:300px; height: 300px;">
      <div class="container">
        <h4><b>Goa</b></h4>
        <p>Email: tajresortgoa@gmail.com</p>
      </div>
    </div></td>
    <td><div class="card">
      <img src="img/jaipur.jpg" alt="Avatar" style="width:300px;height: 300px;">
      <div class="container">
        <h4><b>Jaipur</b></h4>
        <p>Email: jaimahaljaipur@gmail.com</p>
      </div>
    </div></td>
    </tr>
    </table>
    <form class="bookspa" action="contact.php" method="post">
    <div>
        <h3>Feedback</h3>
    </div>
    <div class="in1">
                <div class="input-group">
                    <input type="text" name="name" class="input-area" required id="nameField"/>
                    <label for="nameField" class="label">Name</label>
                </div><br>
            
                <div class="input-group">
                    <input type="email" name="uemail" class="input-area" required id="uemail"/>
                    <label for="uemail" class="label">Email</label>
                </div>
            
              <div class="input-group">
                  <input type="email" name="email" class="input-area" list="hotels" required id="email"/>
                  <label for="email" class="label">Hotel Email</label>
                  <datalist id="hotels">
                    <option value="oberoibangalore@gmail.com">
                    <option value="tajexotica@gmail.com">
                    <option value="jaimahaljaipur@gmail.com">
                    
                  </datalist>
              </div>
    </div>
          
                <div class="input-group">
                    <!--<input type="text" name="pur" class="input-area" required id="purpose"/>-->
                    <textarea name="pur" rows="5" cols="72" class="input-area"  required id="purpose"></textarea>
                    <label for="purpose" class="label">Purpose</label>
                </div>
          
            <div class="wrap1">
                <input type="submit" class="button" value="submit">
            </div>
            
        
    </form>
    </div>
    </div>

    <footer>
      <div class="footer-content">
        <h3>Travvora - Hotel Management System</h3>
        <p>Tourism is a major source of the economy in many countries. It has to made easier for people traveling between places to book and reside in hotels without any inconvenience. To solve this problem, we designed a Hotel Management System which is a website that helps the people/users to book a stay in any one of the hotels located in Bengaluru, Jaipur and Goa. Along with the room booking, they also can avail facilities like spa, event space booking and dining. On the other side, to view the room bookings and bookings of other facilities we have created separate web pages for the managers and receptionists to view the data gathered. The purpose of this website is to perform various management operations of the hotel and ease the job of the people involved.</p>
      </div>
    
       <div class="footer-bottom">
        <p>copyright &copy;2023 <a href="#">Travvora</a>  </p>
        <div class="footer-menu">
          <ul class="f-menu">
             <li><a href="user.html">Home</a></li>
             <li><a href="contact.html">Contact Us</a></li>
          </ul>
        </div>
       </div>
    </footer>
</body>
</html>
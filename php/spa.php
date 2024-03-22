<?php
session_start();
include "db_conn.php";
if(isset($_POST["name"])){
    $id=$_SESSION["uid"];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $hotel=$_POST['hotel'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $query=mysqli_query($con,"SELECT COUNT(*) AS cnt FROM spa WHERE hotel='".$hotel."' AND date='".$date."' AND time='".$time."'");
    $result=mysqli_fetch_object($query);
    $count=$result->cnt;
    if($count>2){
        echo '<script type="text/javascript">alert("Failed");window.location = "user.php";</script>';
    } else {

        $sql="INSERT INTO `spa` VALUES ('$id','$name','$email','$phone','$gender','$hotel','$date','$time');";
        if($con->query($sql)==true){
            echo '<script type="text/javascript">alert("Success");window.location = "user.php";</script>';
        } else {
            echo '<script type="text/javascript">alert("Failed");window.location = "user.php";</script>';
        }
    }
    $con->close();
}

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Spa</title>
  <link rel="stylesheet" href="css/spa.css" />
  <link rel="stylesheet" href="css/footer.css" />
</head>
<body>
    <header>
        <a href="user.html" class="brand">Travvora</a>
        <div class="btn">
          <i class="fas fa-times close-btn"></i>
        </div>
        <div class="menu">
          <a href="book_stay.php"style="float: left;">Book a Stay</a>
          <a href="logout.php">Logout</a>
        </div>
        <div class="btn">
          <i class="fas fa-bars menu-btn"></i>
        </div>
    </header>
    <div class="image">
        <img src="img/spa-1.jpg" alt="eve1" width="100%" height="580px">
    </div>
    <div class="detail">
        <h1>Spa</h1>
    </div>
    <div class="card">
    <div class="spa_form">
    <form class="bookspa" action="spa.php" method="post">
    <table>
        <tr>
            <td><h3>Book Appointment</h3></td>
        </tr>
        <tr>
            <td>
                <div class="input-group">
                    <input type="text" name="name" class="input-area" required id="nameField"/>
                    <label for="nameField" class="label">Name</label>
                </div>
            </td>
            <td>
                <div class="input-group">
                    <input type="text" name="phone" max="10" class="input-area" required id="ph"/>
                    <label for="ph" class="label">Phone No</label>
                </div>
            </td>
            <td>
                <div class="input-group">
                    <input type="email" name="email" class="input-area" required id="email"/>
                    <label for="email" class="label">Email</label>
                </div>
            </td>
            <td>
                <div class="input-group">
                    <input type="text" name="gender" class="input-area" list="gen" required id="gender"/>
                    <label for="gender" class="label">Gender</label>
                    <datalist id="gen">
                        <option value="Female">
                        <option value="Male">
                    </datalist>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="input-group">
                    <input type="text" name="hotel" class="input-area" list="hotels" required id="hotel"/>
                    <label for="hotel" class="label">Hotel</label>
                    <datalist id="hotels">
                        <option value="Oberoi, Bangalore">
                        <option value="Taj Exotica Resort and Spa,Goa">
                        <option value="Jai Mahal Palace, Jaipur">
                    </datalist>
                </div>
            </td>
            <td>
                <div class="input-group">
                    <input type="date" name="date" class="input-area" required id="date" min="<?php echo date('Y-m-d');?>"/>
                </div>
            </td>
            <td>
                <div class="input-group">
                    <input type="time" name="time" class="input-area" required id="time"/>
                    <label for="time" class="label">Start Time</label>
                </div>
            </td>
        </tr>
    </table>     
            <div class="wrap3">
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
<script>
    window.addEventListener("scroll", function(){
      var header = document.querySelector("header");
      header.classList.toggle('sticky', window.scrollY > 0);
    });
    function setAlert(){
    localStorage.setItem("alert","spa");}
</script>
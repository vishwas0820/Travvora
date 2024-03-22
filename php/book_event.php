<?php
session_start();
include "db_conn.php";
if(isset($_POST["name"])){
    $id=$_SESSION["uid"];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $hotel=$_POST['venue'];
    $date=$_POST['date'];
    $guest=$_POST['guest'];
    $purpose=$_POST['pur'];
    $query=mysqli_query($con,"SELECT COUNT(*) AS cnt FROM events WHERE hotel='".$hotel."' AND date='".$date."'");
    $result=mysqli_fetch_object($query);
    $count=$result->cnt;
    if($count>0){
      echo '<script type="text/javascript">alert("Failed");window.location = "user.php";</script>';
    } else {
      $sql="INSERT INTO `events` VALUES ('$id','$name','$email','$phone','$hotel','$date','$guest','$purpose');";
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
  <title>Events</title>
  <link rel="stylesheet" href="css/meeting.css" />
  <link rel="stylesheet" href="css/footer.css" />
</head>
<body>
    <header>
        <a href="user.php" class="brand">Travvora</a>
        <div class="btn">
          <i class="fas fa-times close-btn"></i>
        </div>
        <div class="menu">
          <a href="book_stay.php"style="float: left;">Book a stay</a>
          <a href="logout.php">Logout</a>
        </div>
        <div class="btn">
          <i class="fas fa-bars menu-btn"></i>
        </div>
      </header>
    <div class="image">
        <img src="img/event4.jpg" alt="eve1" width="100%" height="580px">
    </div>
    <div class="detail">
        <h1>Book Event Space</h1>
    </div>

    <form class="bookevent" action="book_event.php" method="post">

    <div class="row1">
            <div class="input-group">
                <input type="text" name="name" class="input-area" required id="nameField"/>
                <label for="nameField" class="label">Name</label>
            </div>
            
                <div class="input-group">
                    <input type="text" name="phone" max="10" class="input-area" required id="ph"/>
                    <label for="ph" class="label">Phone No</label>
                </div>
            
                <div class="input-group">
                    <input type="email" name="email" class="input-area" required id="email"/>
                    <label for="email" class="label">Email</label>
                </div>
    </div>
    <div class="row1">   
                <div class="input-group">
                    <input type="text" name="venue" class="input-area" list="hotels" required id="venue"/>
                    <label for="venue" class="label">Venue</label>
                    <datalist id="hotels">
                      <option value="Grand Ballroom, Oberoi Bangalore, Bangalore">
                      <option value="Palace Ballroom, Jai Mahal Palace, Jaipur">
                      <option value="Durbar Hall, Taj Exotica Resort and Spa,Goa">
                      
                    </datalist>
                </div>
            
                <div class="input-group">
                    <input type="date" name="date" class="input-area" placeholder="Date" required id="date" min="<?php echo date('Y-m-d');?>"/>
                    <label for="date" class="label">Date</label>
                </div>
            
                <div class="input-group">
                    <input type="number" name="guest" min="0" max="900" class="input-area" required id="guest"/>
                    <label for="guest" class="label">Guest</label>
                </div>
    </div>
            
                <div class="input-group">
                    <textarea name="pur" rows="5" cols="72" class="input-area"  required id="purpose"></textarea>
                    <label for="purpose" class="label">Purpose</label>
                </div>
            
                <div class="wrap">
                    <input type="submit" class="button" value="submit">
                </div>
            
        
    </form>
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
             <li><a href="contact.html">Contact</a></li>
          </ul>
        </div>
       </div>
    </footer>
</body>
</html>

<script>
    function setAlert(){
    localStorage.setItem("alert","event");}
    window.addEventListener("scroll", function(){
      var header = document.querySelector("header");
      header.classList.toggle('sticky', window.scrollY > 0);
    });
</script>
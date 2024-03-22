<?php
session_start();
include "db_conn.php";
$array=array(
  'Deluxe Room'=>1,
  'Luxury Room'=> 10,
  'Premier Room'=> 5,
  'Superior Room'=>6,
  'Luxury Suite'=>5,
  'Deluxe Suite'=>4,
  'Heritage Room'=>5, 
  'Deluxe Premium'=>6, 
  'Premium Room'=>6
);
if(isset($_POST["dest"])){
  $dest=$_POST["dest"];
  $room=$_POST["room"];
  $idate=$_POST["cidate"];
  $odate=$_POST["codate"];
  $adult=$_POST["adult"];
  $child=$_POST["child"];
  $id=$_SESSION['uid'];
  $name=$_SESSION['name'];
  $email=$_SESSION['email'];
  $query=mysqli_query($con,"SELECT COUNT(*) AS cnt FROM rooms WHERE dest='".$dest."' AND indate='".$idate."'");
  $result=mysqli_fetch_object($query);
  $count=$result->cnt;
  $query1=mysqli_query($con,"SELECT COUNT(*) AS cnt FROM rooms WHERE dest='".$dest."' AND indate<'".$idate."' AND outdate>='".$odate."'");
  $res1=mysqli_fetch_object($query1);
  $count2=$res1->cnt;
  if($count>=$array[$room] and $count2>=$array[$room]){
    echo '<script type="text/javascript">alert("Failed");window.location = "user.php";</script>';
    
  } else {
    $sql="INSERT INTO `rooms` VALUES ('$id','$name','$email','$dest','$room','$idate','$odate','$adult','$child');";
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
  <title>Book a Stay</title>
  <link rel="stylesheet" href="css/book_styles.css" />
  <link rel="stylesheet" href="css/footer.css" />
</head>
<body>
  <header>
    <a href="user.php" class="brand">Travvora</a>
    <div class="btn">
      <i class="fas fa-times close-btn"></i>
    </div>
    <div class="menu">
      <a href="logout.php">Logout</a>
    </div>
    <div class="btn">
      <i class="fas fa-bars menu-btn"></i>
    </div>
  </header>

  <div class="image">
      <img src="img/jai_room3.jpeg" alt="eve1" width="100%" height="580px">
  </div>
  <div class="h1_tag">
    <h1>Book a Stay</h1>
  </div>

  <div class="card">
  <div class="spa_form">
  <form class="bookspa" action="book_stay.php" method="post">
  <table>
      <tr>
          <td><h3>Book a Room</h3></td>
      </tr>
      <tr>
        <td>
            <div class="input-group">
                <input type="text" name="dest" class="input-area" list="hotels" oninput="getValue()" required id="destField"/>
                <label for="destField" class="label">Destination</label>
                <datalist id="hotels">
                  <option value="Oberoi, Bangalore">
                  <option value="Taj Exotica Resort and Spa,Goa">
                  <option value="Jai Mahal Palace, Jaipur">
                </datalist>
            </div>
        </td>
        <td>
            <div class="input-group">
                <input type="text" name="room" list="room" class="input-area" required id="ro"/>
                <label for="ro" class="label">Room</label>
                <datalist id="room"></datalist>
            </div>
        </td>
        <td>
            <div class="input-group">
                <input type="date" name="cidate" class="input-area" required id="cidate" min="<?php echo date('Y-m-d');?>"/>
                <label for="cidate" class="label">Check In</label>
            </div>
        </td>
    </tr>
    <tr>
      <td>
        <div class="input-group">
            <input type="date" name="codate" class="input-area" required id="codate" min="<?php echo date('Y-m-d');?>"/>
            <label for="codate" class="label">Check Out</label>
        </div>
      </td>
        <td>
            <div class="input-group">
              <input type="number" name="adult" min="0" max="5" class="input-area" required id="adult"/>
              <label for="adult" class="label">Adult</label>
            </div>
        </td>
        <td>
            <div class="input-group">
              <input type="number" name="child" min="0" max="3" class="input-area" required id="child"/>
              <label for="child" class="label">Children</label>
            </div>
        </td>
    </tr>
    <tr>
        <td>
        <div class="wrap">
            <input type="submit" class="button" value="submit">
        </div>
        </td>
    </tr>
  </table>
      
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
  function getValue(){
    var val=document.getElementById('destField').value;
    if(val=='Oberoi, Bangalore'){
      var Bengaluru = ['Deluxe Room','Luxury Room','Premier Room'];
      var list = document.getElementById('room');
      while (list.hasChildNodes()) {
        list.removeChild(list.firstChild);
      }
      Bengaluru.forEach(function(item){
        var option = document.createElement('option');
        option.value = item;
        list.appendChild(option);
      });
    }
    else if(val=='Taj Exotica Resort and Spa,Goa'){
      var goa = ['Superior Room','Luxury Suite','Deluxe Suite'];
      var list = document.getElementById('room');
      while (list.hasChildNodes()) {
        list.removeChild(list.firstChild);
      }
      goa.forEach(function(item){
        var option1 = document.createElement('option');
        option1.value = item;
        list.appendChild(option1);
      });
     }
     else if(val=='Jai Mahal Palace, Jaipur'){
      var jai = ['Heritage Room', 'Deluxe Premium', 'Premium Room'];
      var list = document.getElementById('room');
      while (list.hasChildNodes()) {
        list.removeChild(list.firstChild);
      }
      jai.forEach(function(item){
        var option1 = document.createElement('option');
        option1.value = item;
        list.appendChild(option1);
      });
     }

  }

  window.addEventListener("scroll", function(){
      var header = document.querySelector("header");
      header.classList.toggle('sticky', window.scrollY > 0);
    });
  function setAlert(){
  localStorage.setItem("alert","room");}
</script>
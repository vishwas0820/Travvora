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

$sql="SELECT name,dest,indate,outdate,adults,children FROM rooms,manager WHERE dest=hotel AND hotel='".$_SESSION['hotel']."'";
$result=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Room Booking</title>
  <link rel="stylesheet" href="css/navbar.css" /> 
  <link rel="stylesheet" href="css/userstyles.css" /> 
  <link rel="stylesheet" href="css/search.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      margin-top: 50px;
    }
    
    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #customers tr:nth-child(even){background-color: #f2f2f2;}
    
    #customers tr:hover {background-color: #ddd;}
    
    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }
    .h1-tag{
        margin-top: 100px;
        font-family: "Raleway", sans-serif;
    }
    </style>

</head>
<body>
    <header>
        <a href="manager.php" class="brand">Travvora</a>
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

    <div class="h1-tag">
        <h1>Bookings</h1>
    </div>

    <form action="search_room.php" method="get">
      <div class="search">
          <input type="text" name="searchTerm" class="searchTerm" placeholder="Search...">
          <button type="submit" class="searchButton">
            <i class="fa fa-search"></i>
          </button>   
      </div>
    </form>

  <table id="customers">
    <tr>
      <th>Name</th>
      <th>Destination</th>
      <th>Check In</th>
      <th>Check Out</th>
      <th>Adults</th>
      <th>Children</th>
    </tr>
    <?php
      while($rows=mysqli_fetch_assoc($result))
      {
    ?>
    <tr>
      <td><?php echo $rows['name'];?></td>
      <td><?php echo $rows['dest'];?></td>
      <td><?php echo $rows['indate'];?></td>
      <td><?php echo $rows['outdate'];?></td>
      <td><?php echo $rows['adults'];?></td>
      <td><?php echo $rows['children'];?></td>
    </tr>
    <?php
      }
    ?>
  </table>
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

<script>
      //javascript for navigation bar effect on scroll
      window.addEventListener("scroll", function(){
        var header = document.querySelector("header");
        header.classList.toggle('sticky', window.scrollY > 0);
      });
  
      //javascript for responsive navigation sidebar menu
      var menu = document.querySelector('.menu');
      var menuBtn = document.querySelector('.menu-btn');
      var closeBtn = document.querySelector('.close-btn');
  
      menuBtn.addEventListener("click", () => {
        menu.classList.add('active');
      });
  
      closeBtn.addEventListener("click", () => {
        menu.classList.remove('active');
      });
</script>

</html>
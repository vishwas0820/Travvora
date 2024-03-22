<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Travvora</title>
  <link rel="stylesheet" href="css/userstyles.css" /> 
  <link rel="stylesheet" href="css/style_card.css" /> 
  <link rel="stylesheet" href="css/navbar.css" /> 
  <link rel="stylesheet" href="css/footer.css" /> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body onload="checkAlert()">
  
  <header>
    <a href="user.php" class="brand">Travvora</a>
    <div class="btn">
      <i class="fas fa-times close-btn"></i>
    </div>
    <div class="menu">
      <a href="contact.php" style="float: left;">Contact Us</a>
      <a href="book_stay.php"style="float: left;">Book a Stay</a>
      <a href="logout.php">Logout</a>
    </div>
    <div class="btn">
      <i class="fas fa-bars menu-btn"></i>
    </div>
  </header>

  <!-- Slideshow container -->
<div class="slideshow-container" >

	<!-- Full-width images with number and caption text -->
	<div class="mySlides fade">
	  <img src="img/user.jpg" style="width:100%">
	  <div class="text">Welcome to Travvora, <?php echo $_SESSION['name'];?></div>
	</div>
  
	<div class="mySlides fade">
	  <img src="img/user1.jpg" style="width:100%">
	  <div class="text">Luxurious 5 Star Hotels</div>
	</div>
  
	<div class="mySlides fade">
	  <img src="img/user3.jpeg" style="width:100%">
	  <div class="text">Jai Mahal Palace - Jewel of Jaipur</div>
	</div>
  
	<!-- Next and previous buttons -->
	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
  <br>
  
  <!-- The dots/circles -->
  <div style="text-align:center">
	<span class="dot" onclick="currentSlide(1)"></span>
	<span class="dot" onclick="currentSlide(2)"></span>
	<span class="dot" onclick="currentSlide(3)"></span>
  </div>

  <div class="h1-tag">
    <h1>Popular destinations</h1>
    </div>

  <div class="container">
    <!--image row start-->
    <div class="row">
      <!--image card start-->
      <div class="image">
      <img src="img/goa.jpg" alt="" style="width: 460px; height: 300px;">
      <div class="details">
        <h2><span>Goa</span></h2>
        <p>Goa is one of the most favorite destination among Indian tourists due to its pristine beaches which offer beautiful scenes and scenery</p>
        <div class="more">
        <a href='goa.html' class="read-more"><span> Explore</span></a>
        </div>
      </div>
      </div>
      <!--image card end-->
      <!--image card start-->
      <div class="image">
      <img src="img/bangalore.jpg" alt="" style="width: 460px; height: 300px;">
      <div class="details">
        <h2><span>Bangalore</span></h2>
        <p>Located in south western India, Bengaluru is home to beautiful examples of traditional architecture, as well as modern office buildings, lush parks and gardens.</p>
        <div class="more">
          <a href='bangalore.html' class="read-more"><span> Explore</span></a>
        </div>
      </div>
      </div>
      <!--image card end-->
      <!--image card start-->
      <div class="image">
      <img src="img/jaipur.jpg" alt="">
      <div class="details">
        <h2><span>Jaipur</span></h2>
        <p>The famous walled capital city of Rajasthan. Jaipur has been fondly known as the “Pink City” </p>
        <div class="more">
          <a href='jaipur.html' class="read-more"><span> Explore</span></a>
        </div>
      </div>
      </div>
      <!--image card end-->
    </div>
    <!--image row end-->
    <!--image row start-->
    </div>
  
    <div class="h1-tag">
      <h1>Facilities</h1>
      </div>
    
      <div class="container">
      <!--image row start-->
      <div class="row">
        <!--image card start-->
        <div class="image">
        <img src="img/event-1.jpeg" alt="" style="width: 460px; height: 300px;">
        <div class="details">
          <h2><span>Events</span></h2>
          <p>Book spaces for special occasion</p>
          <div class="more">
          <a href="meeting.html" class="read-more"><span> Explore</span></a>
          </div>
        </div>
        </div>
        <!--image card end-->
        <!--image card start-->
        <div class="image">
        <img src="img/spa.jpg" alt="" style="width: 460px; height: 300px;">
        <div class="details">
          <h2><span>Spa</span></h2>
          <p>Enjoy one of the best spas and massaging provided by our hotel</p>
          <div class="more">
          <a href='spa.php' class="read-more"><span> Explore</span></a>
          </div>
        </div>
        </div>
        <!--image card end-->
        <!--image card start-->
        <div class="image">
        <img src="img/dine.jpeg" alt="" >
        <div class="details">
          <h2><span>Dining</span></h2>
          <p>Enjoy the taste of exotic food prepared by our chefs</p>
          <div class="more">
          <a href='dining.html'class="read-more"><span>Explore</span></a>
          </div>
        </div>
        </div>
        <!--image card end-->
      </div>
      <!--image row end-->
      <!--image row start-->
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

<script>
  let slideIndex = 1;
  showSlides(slideIndex);
  
  // Next/previous controls
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }
  
  // Thumbnail image controls
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }
  
  function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
  }

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
  function checkAlert() {
  if(localStorage.getItem("alert")==="true"){
    window.alert("Logged In Successfully");
    localStorage.removeItem("alert");
  }
  if(localStorage.getItem("alert")==="room"){
    window.alert("Room booked successfully");
    localStorage.removeItem("alert");
  }
  if(localStorage.getItem("alert")==="event"){
    window.alert("Event appointment successful");
    localStorage.removeItem("alert");
  }
  if(localStorage.getItem("alert")==="spa"){
    window.alert("Spa appointment successful");
    localStorage.removeItem("alert");
  }
  if(localStorage.getItem("alert")==="noroom"){
    window.alert("Failed: Rooms are full on requested date");
    localStorage.removeItem("alert");
  }
}
</script>
</html>
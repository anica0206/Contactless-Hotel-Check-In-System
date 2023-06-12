<?php

    session_start();

    include("dbConn.php");
    include("session.php");

    $userData = userData($db);

    $email = $userData['email'];

    $q = "select * from booking join room on booking.roomID = room.roomID where email='$email'";
    $query = mysqli_query($db, $q);
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Check Inn</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/aos.css">
<link rel="stylesheet" href="css/bootstrap-datepicker.css">
<link rel="stylesheet" href="css/jquery.timepicker.css">
<link rel="stylesheet" href="css/fancybox.min.css">

<link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

<!-- Theme Style -->
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="site-header js-site-header">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="homePage.php">Check Inn</a></div>
      <div class="col-6 col-lg-8">


        <div class="site-menu-toggle js-site-menu-toggle"  data-aos="fade">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <!-- END menu-toggle -->

        <div class="site-navbar js-site-navbar">
          <nav role="navigation">
            <div class="container">
              <div class="row full-height align-items-center">
                <div class="col-md-6 mx-auto">
                  <ul class="list-unstyled menu">
                    <li><a href="homePage.php">Home</a></li>
                    <li><a href="viewMyProfile.php">MyPage</a></li>
                    <li class="active"><a href="viewBooking.php">Booking History</a></li>
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- END head -->

    <section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade">
            <h1 class="heading mb-3">Booking History</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="homePage.php">Home</a></li>
              <li>&bullet;</li>
              <li>Booking History</li>
            </ul>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
<!-- END section -->

<section class="section">
  <div class="container" id="next">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-md-7">
        <h2 class="heading" data-aos="fade-up">My Booking</h2>
        <!-- <p data-aos="fade-up" data-aos-delay="100">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p> -->
      </div>
    </div>
    
    <div class="row">
    <?php

    while($data = mysqli_fetch_array($query))
    {
    ?>

        <div class="col-md-6 col-lg-4" data-aos="fade-up">
            <a href="updateBooking.php?bookingID=<?php echo $data['bookingID']; ?>" class="room">
                <img style="width: 400px; height:300px" class="img-fluid mb-3" alt="" src="images/<?php echo $data['fileName']; ?>">
            </a>
          <div class="p-3 text-center room-info">
            <h2>
                <a href="updateBooking.php?bookingID=<?php echo $data['bookingID']; ?>&&<?php echo $data['roomID']; ?>">
                    <?php echo $data['roomType']; ?> Room
                </a>
            </h2>
            <span class="text-uppercase letter-spacing-1">Check In Date: <?php echo $data['checkInDate']; ?></span><br />
            <span class="text-uppercase letter-spacing-1">Check Out Date: <?php echo $data['checkOutDate']; ?></span><br />
            <span class="text-uppercase letter-spacing-1">No of Guest Staying: <?php echo $data['noOfCustomer']; ?></span>
          </div>
        </a>
      </div>

    <?php
    }
    ?>

    </div>
  </div>
</section>

<footer class="section footer-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
            <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span> <span> 198 West 21th Street, <br> Suite 721 New York NY 10016</span></p>
          </div>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
              <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span> <span> (+1) 435 3533</span></p>
          </div>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
            <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span> info@domain.com</span></p>
          </div>
        </div>
        <div class="row pt-5">
          <p class="col-md-6 text-left">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
          <div class="col-md-6 mb-5 pr-md-5 text-right">
            <p>CHECK INN Co., Ltd</p>
          </div>
        </div>
      </div>
    </footer>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.fancybox.min.js"></script>


<script src="js/aos.js"></script>

<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/jquery.timepicker.min.js"></script> 



<script src="js/main.js"></script>
</body>
</html>

<?php
    session_start();

    include("dbConn.php");
    include("session.php");

    $userData = userData($db);
    $bookingID = $_GET['bookingID'];
    $email = $userData['email'];

    $hotelID = $_SESSION['hotelID']; 
    $room = $_SESSION['roomID'];
    $checkIn = $_SESSION['checkIn'];
    $checkOut = $_SESSION['checkOut'];
    $noOfCustomer = $_SESSION['noOfCustomer'];
    $notes = $_SESSION['notes'];

    $days = $_SESSION['noOfNight'];
    $price = $_SESSION['price'];

    $totalPrice = (double)$days * (double)$price;

    $q = "SELECT booking.hotelID, booking.email FROM booking WHERE booking.email = '$email' AND booking.hotelID = '$hotelID'";
    $result = mysqli_query($db, $q);

    if (mysqli_num_rows($result) > 0) 
    {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['email'];
        $hotelID = $_SESSION['hotelID'];
    }

    if (isset($_POST['submit'])) 
    {
        $name = $_POST['customerName'];
        $cardNumber = $_POST['cardNumber'];
        $expiryDate = $_POST['expiryDate'];
        $cvc = $_POST['cvc'];

        if (!empty($name) && !empty($email) && !empty($cardNumber) && !empty($expiryDate) && !empty($cvc)) 
        {
            $cn = (string) abs($cardNumber);
            $cvc1 = (string) abs($cvc);

            
            if(strlen($cn) < 16 || strlen($cn) > 16)
            {
              echo '<script>alert("Invalid Card Number.")</script>';
            }
            else if (strlen($cvc1) < 3 || strlen($cvc1) > 3)
            {
              echo '<script>alert("Invalid CVC.")</script>';
            }
            else
            {
                $query = "INSERT INTO payment (nameOnCard, email, cardNumber, expiryDate, cvc, hotelID, roomID)
                        VALUES ('$name', '$email', '$cardNumber', '$expiryDate', '$cvc', '$hotelID', '$room')";

                if (mysqli_query($db, $query)) 
                {
                    $query1 = "INSERT INTO booking (bookingID, hotelID, roomID, email, noOfNight, checkInDate, checkOutDate, notes, noOfCustomer)
                            VALUES (\"\", '$hotelID', '$room', '$email', '$days', '$checkIn', '$checkOut', '$notes', '$noOfCustomer')";

                    $bookingQuery = "INSERT INTO booking (bookingID, hotelID, roomID, email, noOfNight, checkInDate, checkOutDate, notes, noOfCustomer)
                            VALUES (\"\", '$hotelID', '$room', '$email', '$days', '$checkIn', '$checkOut', '$notes', '$noOfCustomer')";

                    if(mysqli_query($db, $bookingQuery))
                    {
                        $bookingIDid = mysqli_insert_id($db);
                        $subject = "Booking Confirmation (Booking ID: ".$bookingID.")";
                        $txt = "Dear Customer,\nHere are the booking details.\nHotel ID: .$hotelID.\nRoom ID: .$room.\nCheck-In Date:.$checkIn.\nCheck-Out Date: .$checkOut.\nNumber Of                                     Customers: .$noOfCustomer.\nNotes: .$notes.\nThank you for booking with us!";


                        $headers = "From: webmaster@example.com" . "\r\n" .
                                     "CC: somebodyelse@example.com";
                        $headers = 'From: user@checkinn.infinityfreeapp.com' . " " .
                        'Reply-To: user@checkinn.infinityfreeapp.com' . " " .
                        'X-Mailer: PHP/' . phpversion();

                        if(mail($email,$subject,$txt,$headers)){
                            echo "<script>
                                alert('Email sent successfully.');
                                window.location.href='viewBooking.php';
                            </script>";
                        } else {
                            $lastError = error_get_last();
                            echo '<script>alert("Failed! Error: '. $lastError['message']. '")</script>';
                        }

                    }
                    else
                    {
                        echo '<script>alert("Error while saving booking!")</script>';
                        echo("Error description: " . mysqli_error($db));
                            
                    }

                    // mysqli_query($db, $query1);
                    //header("Location: emailSent.php");
                    //echo '<script>alert("Email Sent Succesfully!")</script>';


                    //header("Location: viewBooking.php");
                    //die;
                } 
                else 
                {
                    echo '<script>alert("Payment failed!")</script>';
                } 
            }
        } 
        else if (empty($name))
        {
            echo '<script>alert("Please enter name on card.")</script>';
        }
        else if (empty($cardNumber))
        {
            echo '<script>alert("Please enter card number.")</script>';
        }
        else if (empty($expiryDate))
        {
            echo '<script>alert("Please enter expiry date.")</script>';
        }
        else if (empty($cvc))
        {
            echo '<script>alert("Please enter CVC.")</script>';
        }
    }

    if (isset($_POST['back'])) 
    {
        header("Location: homePage.php");
    }
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
          <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="index.php">Check Inn</a></div>
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
                        <li><a href="viewBooking.php">Booking History</a></li>
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
            <h1 class="heading mb-3">Payment</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="homePage.php">Home</a></li>
              <li>&bullet;</li>
              <li>Payment</li>
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

    <section class="section contact-section" id="next">
      <div class="container">

        <div class="row">
          <div class="col-md-7-" data-aos="fade-up" data-aos-delay="100">
            
            <form method="post" class="bg-white p-md-5 p-4 mb-5 border">

                <div class="row">
                    <div class="col-md-6 form-group">
                    <label class="text-black font-weight-bold" for="name">Name</label>
                    <input type="text" id="customerName" name="name" class="form-control " value="<?php echo $userData['name']?>" disabled>
                    </div>
                    <div class="col-md-6 form-group">
                    <label class="text-black font-weight-bold" for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control " value="<?php echo $email?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                    <label class="text-black font-weight-bold" for="name">Name On Card</label>
                    <input type="text" id="customerName" name="customerName" class="form-control ">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <label class="text-black font-weight-bold" for="cardNumber">Card Number</label>
                        <input type="number" id="cardNumber" name="cardNumber" class="form-control ">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                      <label class="text-black font-weight-bold" for="cvc">CVC</label>
                      <input type="number" id="cvc" name="cvc" class="form-control ">
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="text-black font-weight-bold" for="expiryDate">Expiry Date</label>
                        <input type="month" id="expiryDate" name="expiryDate" class="form-control " min="2023-01" max="2100-12">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 form-group text-right">
                      <br>
                        <input name="submit" type="submit" value="Make Payment" class="btn btn-primary text-white py-3 px-5 font-weight-bold">
                    </div>
                </div>
            </form>

          </div>
          <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
              <div class="col-md-10 ml-auto contact-info">
                <p><span class="d-block">Hotel ID:</span> <span><?php echo $hotelID?></span></p>
                <p><span class="d-block">Room ID:</span> <span><?php echo $room?></span></p>
                <p><span class="d-block">Number of Night staying:</span> <span><?php echo $days?></span></p>
                <p><span class="d-block">Total Price:</span> <span>$<?php echo $totalPrice?></span></p>
              </div>
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
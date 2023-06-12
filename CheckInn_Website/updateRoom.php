<?php
    session_start();
    include("session.php");
    include("dbConn.php");

    $userData = userData($db);
    
    $roomID = $_GET['roomID'];

    $q = "select * from room where roomID='$roomID'";
    $query = mysqli_query($db, $q);

    $data = mysqli_fetch_array($query);

    if(isset($_POST['update']))
    {
        $roomType = $_POST['roomType'];
        $price = $_POST['price'];
        $noOfGuestCanStay = $_POST['noOfGuestCanStay'];


        if(!empty($roomType) && !empty($price) && !empty($noOfGuestCanStay))
        {
            
                $query = "update room set roomType='$roomType', price='$price', noOfGuestCanStay='$noOfGuestCanStay' where roomID='$roomID'";
                mysqli_query($db, $query);

                header("Location: hotelOperator.php");
                die;
            
        }    
        else
        {
            echo '<script>alert("Please fill in the blank!")</script>';
        }
    }
    else if(isset($_POST['back']))
    {
        header("Location: hotelOperator.php");
    }
    else if(isset($_POST['delete']))
    {
        $query = "select * from room where roomID = '$roomID'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array ($result);

        $currentDirectory = getcwd();
        $uploadDirectory = "/images/";
        $path = $currentDirectory . $uploadDirectory . basename($row['fileName']); 

        if (mysqli_query($db, $query))
        {
          // Use unlink() function to delete a file
          unlink($path);
        }

        $query = "delete from room where roomID='$roomID'";
        mysqli_query($db, $query);

        header("Location: hotelOperator.php");
        die;
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
          <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="hotelOperator.php">Check Inn</a></div>
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
                        <li class="active"><a href="hotelOperator.php">Home</a></li>
                        <li><a href="viewHotelOperatorInfo.php">MyPage</a></li>
                        <li><a href="hotelBookingHistory.php">Booking History</a></li>
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
            <h1 class="heading mb-3">Update Room</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="hotelOperator.php">Home</a></li>
              <li>&bullet;</li>
              <li>Hotel Rooms</li>
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
            <div class="col" data-aos="fade-up" data-aos-delay="100">
            
                <form method="post" class="bg-white p-md-5 p-4 mb-5 border">

                <div class="row">
                    <div class="col-md-6 form-group">
                    <label class="text-black font-weight-bold" for="Room Type">Room Type</label>
                    <input type="text" name="roomType" class="form-control " value="<?php echo $data['roomType'];?>">
                    </div>
                    <div class="col-md-6 form-group">
                    <label class="text-black font-weight-bold">Price</label>
                    <input class="form-control " type='number' min='0' max='100000'value="<?php echo $data['price'];?>" name="price">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <label class="text-black font-weight-bold" for="noOfGuest">Number Of Guests Can Stay</label>
                        <select name="noOfGuestCanStay" class="form-control">
                            <option value="<?php echo $data['noOfGuestCanStay'];?>"><?php echo $data['noOfGuestCanStay'];?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4+</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm form-group text-left">
                      <input name="back" type="submit" value="Back" class="btn btn-primary text-white py-3 px-5 font-weight-bold">
                    </div>
                    <div class="col-sm form-group text-center">
                        <input name="delete" type="submit" value="Delete" class="btn btn-primary text-white py-3 px-5 font-weight-bold">
                    </div>
                    <div class="col-sm form-group text-right">
                        <input name="update" type="submit" value="Update" class="btn btn-primary text-white py-3 px-5 font-weight-bold">
                    </div>
                </div>
                </form>


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
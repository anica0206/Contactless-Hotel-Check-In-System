<?php
    session_start();

    include("dbConn.php");
    include("session.php");

    $userData = userData($db);

    $email= $userData['email'];

    $hotel = $_GET['hotelID'];
    $room = $_GET['roomID'];

    $q = "select * from customer where email='$email'";
    $query = mysqli_query($db, $q);

    $q1 = "select * from room where roomID='$room'";
    $query1 = mysqli_query($db, $q1);

    $q2 = "select * from booking where roomID='$room'";
    $query2 = mysqli_query($db, $q2);

    function createRange($start, $end, $format = 'Y-n-j') {
      $start  = new DateTime($start);
      $end    = new DateTime($end);
      $invert = $start > $end;

      $dates = array();
      $dates[] = $start->format($format);
      while ($start != $end) {
          $start->modify(($invert ? '-' : '+') . '1 day');
          $dates[] = $start->format($format);
      }
      return $dates;
    }

    $unavailable = array();

    while ($data = mysqli_fetch_array($query2))
    {
        $a = createRange($data['checkInDate'], $data['checkOutDate']);
        $unavailable = array_merge($unavailable, $a);
    }

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $checkIn = $_POST['checkIn'];
        $checkOut = $_POST['checkOut'];
        $noOfCustomer = $_POST['noOfCustomer'];
        $notes = $_POST['notes'];
        $dateDiff = date_diff(date_create($checkIn), date_create($checkOut));

        $days = $dateDiff->format("%d");

        if(!empty($checkIn) && !empty($checkOut) && !empty($noOfCustomer))
        {
            
          $_SESSION['hotelID'] = $hotel;
          $_SESSION['roomID'] = $room;
          $_SESSION['checkIn'] = $checkIn;
          $_SESSION['checkOut'] = $checkOut;
          $_SESSION['noOfCustomer'] = $noOfCustomer;
          $_SESSION['notes'] = $notes;
          $_SESSION['noOfNight'] = $days;

          header("Location: customerPayment.php");
            
        } 
        else if(empty($checkIn)&&empty($checkOut))
        {
          echo '<script>alert("Please add the dates.")</script>';
        }   
        else if(empty($checkIn))
        {
          echo '<script>alert("Please add Date Check In.")</script>';
        }
        else if(empty($checkOut))
        {
          echo '<script>alert("Please add Date Check Out.")</script>';
        }
    }

    if(isset($_POST['back']))
    {
      header("Location: homePage.php");
    }

?> 

<!DOCTYPE HTML>
<html lang="en"> 
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
            <h1 class="heading mb-3">Reservation Form</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="homePage.php">Home</a></li>
              <li>&bullet;</li>
              <li>Reservation</li>
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
            
            <form method="post" action="" class="bg-white p-md-5 p-4 mb-5 border">
              
            <?php
              while($data = mysqli_fetch_array($query)) :?>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label class="text-black font-weight-bold" for="name">Name</label>
                    <input type="text" id="name" class="form-control " placeholder="<?php echo $data['customerName'];?>" disabled>
                  </div>
                  <div class="col-md-6 form-group">
                    <label class="text-black font-weight-bold" for="phone">Phone</label>
                    <input type="text" id="phone" class="form-control " placeholder="<?php echo $data['phone'];?>" disabled>
                  </div>
                </div>
            
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label class="text-black font-weight-bold" for="email">Email</label>
                    <input type="email" id="email" class="form-control " placeholder="<?php echo $data['email'];?>" disabled>
                  </div>
                </div>
              <?php endwhile;?>

              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="checkin_date">Date Check In</label>
                  <input id="checkIn" name="checkIn" class="form-control">
                </div>
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="checkout_date">Date Check Out</label>
                  <input id="checkOut" name="checkOut" class="form-control">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="adults" class="font-weight-bold text-black">Adults</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="noOfCustomer" id="adults" class="form-control">
                      <?php 
                          $data = mysqli_fetch_array($query1);

                          $a= $data['noOfGuestCanStay'];

                          if($a == 2)
                          {
                            echo "
                                    <option value=\"1\">1</option>
                                    <option value=\"2\">2</option>";
                          }
                          else
                          {
                            echo "
                                    <option value=\"1\">1</option>
                                    <option value=\"2\">2</option>
                                    <option value=\"3\">3</option>
                                    <option value=\"4+\">4+</option>";
                          }

                          $price = $data['price'];
                          $_SESSION['price'] = $price;
                       ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-6 form-group">
                    <label class="text-black font-weight-bold" for="phone">Room Type</label>
                    <input type="text" id="phone" class="form-control " placeholder="<?php echo $data['roomType'];?>" disabled>
                    <input type="hidden" name="hotelid" value="<?php echo $_GET['hotelID']; ?>">
                </div>
                
              </div>

              <div class="row mb-4">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="message">Notes</label>
                  <textarea name="notes" id="message" class="form-control " cols="30" rows="8"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-sm form-group">
                    <input name="back" type="submit" value="Back" class="btn btn-primary text-white py-3 px-5 font-weight-bold">
                </div>
                <div class="col-md-6 form-group text-right">
                  <input type="submit" value="Proceed to Payment" class="btn btn-primary text-white py-3 px-5 font-weight-bold">
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

    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">  
      <script src="https://code.jquery.com/jquery-1.10.2.js"></script>  
      <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>  
      <!-- Javascript -->  
      <script>

        var unavailableDates = <?php echo json_encode($unavailable); ?>;
        console.log(unavailableDates);
        console.log(typeof(unavailableDates[0]));


        function unavailable(date) {
            ymd = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
            if ($.inArray(ymd, unavailableDates) == -1) {
                return [true, ""];
            } else {
                return [false, "", "Unavailable"];
            }
        }

        $(function() {
            $("#checkIn").datepicker({
                defaultDate: new Date(),
                dateFormat: "yy-m-d",
                minDate: new Date(),
                beforeShowDay: unavailable
            });

        });

        $(function() {
            $("#checkOut").datepicker({
                defaultDate: new Date(),
                dateFormat: "yy-m-d",
                minDate: new Date(),
                beforeShowDay: unavailable
            });

        });

        var myElement = document.getElementById("checkIn").value;
        console.log(myElement);


      </script>
  </body>
</html>

<?php

    session_start();

    include("dbConn.php");
    include("session.php");

    $userData = userData($db);
    $hotelID = $userData['hotelID'];

    $q = "select * from room where hotelID = '$hotelID'";
    $query = mysqli_query($db, $q);
    $row = mysqli_num_rows($query);



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
                    <li><a href="hotelOperator.php">Home</a></li>
                    <li><a href="viewHotelOperatorInfo.php">MyPage</a></li>
                    <li><a href="hotelBookingHistory.php">Booking History</a></li>
                    <li><a href="allCustomers.php">Customer Accounts</a></li>
                    <li class="active"><a href="generateQR.php">QR codes</a></li>
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
            <h1 class="heading mb-3">QR Codes</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="hotelOperator.php">Home</a></li>
              <li>&bullet;</li>
              <li>QR codes</li>
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
    <div class="row justify-content-center text-center mb-5" data-aos="fade-up">
        <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">Generate QR codes</h2></br>
        </div>
    </div>

    <form method="post">
    <div class="row">
        <div class="col">
            <div class="field-icon-wrap">
            <div class="icon"><span class="icon-calendar"></span></div>
            <input class="form-control" type="number" name="num_codes" placeholder="Number of QR codes" min="1" max="<?php echo $row; ?>">
            </div>
        </div>
        <div class="col-md-6 col-lg-3 align-self-end">
           <input name="generate" type="submit" value="Get QR" class="btn btn-primary text-white py-3 px-5 font-weight-bold">
        </div>
    </div>
    </form>

    </br>
   
    <div class="row">
        <table style="text-align: center" class="table table-hover" data-aos="fade-up">
        <thead>
            <tr>
                <th scope="col">Room ID </th>
                <th scope="col">QR codes </th>
                <th scope="col">Download </th>
            </tr>
        </thead>
        
        <tbody data-aos="fade-up">

        <?php

            if(isset($_POST['generate']))
            {
                $num_codes = $_POST['num_codes'];

                for($i=1; $i <= $num_codes; $i++)
                {
                    $roomID = $hotelID."_".$i;
                    $qr_code = "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$roomID&choe=UTF-8";

                    $tbody = "<form action='' method='post'><tr>
                                <td scope='row'>$roomID</td>
                                <td><img src='$qr_code'></td>
                                <td>
                                  <a onclick=\"PrintImage('$qr_code')\"
                                    class='btn btn-primary text-white py-1 px-4 font-weight-bold' print> Print</a>                                
                                </td>
                            </tr></form>";

                    echo $tbody;

                    $sql = "update room set QR = '$qr_code' where roomID = '$roomID'";
                    mysqli_query($db, $sql);
                }
            }


            ?>

        </tbody>

        </table>
    </div>
  </div>
</section>

<footer class="section footer-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-3 mb-5 pr-md-5 contact-info">a
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

<script type="text/javascript">
  // print an image
  function ImagetoPrint(source){
    return "<html><head><script>function step1(){\n" +
           "setTimeout('step2()', 10);}\n" +
           "function step2(){window.print();window.close()}\n" +
           "</scri"+"pt></head><body onload='step1()'>\n" +
           "<img src='" + source + "'/></body></html>";  
  }
  function PrintImage(source){
     Pagelink = "about:blank";
     var pwa = window.open(Pagelink, "_new");
     pwa.document.open();
     pwa.document.write(ImagetoPrint(source));
     pwa.document.close();
  }
</script>
</body>
</html>

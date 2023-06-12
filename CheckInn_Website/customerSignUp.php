<?php
    session_start();
    include("session.php");
    include("dbConn.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $password = $_POST['password'];
        $name = $_POST['customerName'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $notes = $_POST['notes'];
        $dateOfBirth = $_POST['dateOfBirth'];
        

        if(!empty($name) && !empty($phone) && !empty($email) && !empty($password) && !empty($dateOfBirth) && !empty($gender))
        {
            
          $query = "select * from users where email = '$email'";
          $result = mysqli_query($db, $query);

          $query1 = "select * from customer where email = '$email'";
          $result1 = mysqli_query($db, $query1);
          
          $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

          if($result)
          {
              $user_data = mysqli_fetch_assoc($result);

              if($user_data['email'] === $email)
              {
                echo '<script>alert("This email is already being used. Please use another email.")</script>';
              }
              else if (!preg_match($regex, $email))
              {
                echo '<script>alert("Please enter a valid email.")</script>';
              }
              else if(strlen($password) < 8)
              {
                echo '<script>alert("Password must be more than 8 characters in length.")</script>';
              }
              else
              {
                $query = "insert into users (email, password, name, dateOfBirth, profile, status) values ('$email', '$password', '$name', '$dateOfBirth', 'Customer', 'Active')";
                mysqli_query($db, $query);

                $query1 = "insert into customer (email, customerName, dateOfBirth, phone, notes, gender) values ('$email', '$name','$dateOfBirth', '$phone','$notes','$gender')";
                mysqli_query($db, $query1);

                header("Location: login.php");
                die;
              }
          }
            
        }    
        else if (empty($email))
        {
            echo '<script>alert("Please enter email.")</script>';
        }
        else if (empty($password))
        {
            echo '<script>alert("Please enter password.")</script>';
        }
        else if (empty($name))
        {
            echo '<script>alert("Please enter name.")</script>';
        }
        else if (empty($dateOfBirth))
        {
            echo '<script>alert("Please enter Date of Birth.")</script>';
        }
        else if (empty($phone))
        {
            echo '<script>alert("Please enter phone number.")</script>';
        }
        else if (empty($email))
        {
            echo '<script>alert("Please enter email.")</script>';
        }
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li class="active"><a href="customerSignUp.php">Sign Up</a></li>
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
            <h1 class="heading mb-3">Sign Up Form</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="index.php">Home</a></li>
              <li>&bullet;</li>
              <li>Sign Up</li>
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
                    <label class="text-black font-weight-bold" for="name">Email</label>
                    <input type="text" id="email" name="email" class="form-control ">
                    </div>
                    <div class="col-md-6 form-group">
                    <label class="text-black font-weight-bold" for="phone">Password</label>
                    <input type="password" id="phone" name="password" class="form-control ">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                    <label class="text-black font-weight-bold" for="name">Name</label>
                    <input type="text" id="name" name="customerName" class="form-control ">
                    </div>
                    <div class="col-md-6 form-group">
                    <label class="text-black font-weight-bold" for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" class="form-control ">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                      <label class="text-black font-weight-bold" for="name">Date Of Birth</label>
                      <input class="form-control " type="date" id="dateOfBirth" name="dateOfBirth"> 
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="gender" class="font-weight-bold text-black">Gender</label>
                      <div class="field-icon-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="gender" id="gender" class="form-control">
                          <option value="Male"> Male</option>
                          <option value="Female"> Female</option>
                        </select>
                      </div>
                    </div>
                </div>         

              <div class="row mb-4">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="message">Notes</label>
                  <textarea name="notes" id="message" class="form-control " cols="30" rows="8"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="submit" value="Sign Up" class="btn btn-primary text-white py-3 px-5 font-weight-bold">
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


<?php
session_start();
include 'connection.php';
if(isset($_POST['submit']))
{
    $message=$_POST['message'];
    $date=$_POST['date'];
    $id=$_SESSION['id'];
    mysqli_query($con,"INSERT INTO `feedback_tb` (`message`,`customer_id`,`date`)VALUES('$message','$id','$date')");
    echo"<script>alert('feedback submitted')</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>


      <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <a href="index.html"> <h1> TURF MANAGEMENT </h1></a>
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="index.html">Regna</a></h1>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
        <li><a class="nav-link scrollto active" href="customerhomepage.php">Home</a></li>
          <li><a class="nav-link scrollto" href="customer-profile.php">view profile</a></li>
           <li><a class="nav-link scrollto" href="book_turf.php">view turf</a></li>
          <li><a class="nav-link scrollto " href="feedback.php">feedback</a></li>
           <li><a class="nav-link scrollto" href="notification.php">notification</a></li>
         
          <li><a class="nav-link scrollto" href="logout.php">log out</a></li> 

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
  <form method="POST">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  <div class="card-container"  >
    
   <center><div class="card" style="width:30%; ">

    <div class="card-body">
      <p class="card-title" style="color:red;">
      <label style="color:red;" >message :</label>
      <textarea type="text" name="message" value="message"  ></textarea>
</p>
      <p class="card-text">
        <label style="color:red;" >date</label>
        <input type="date" name="date" value="date" required>
      </p>

      
    <input class="btn btn-primary" type="submit" name="submit" value="submit">
    </div>
  </div>
  </center>
  </form>

</div>
    
      
  </section><!-- End Hero Section -->

  <main id="main">

      </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
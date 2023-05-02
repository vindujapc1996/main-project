<?php
session_start();
include 'connection.php';
$data=mysqli_query($con,"SELECT turf_id,turf_name,turf_place,amount,image FROM `turf_registration`");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        table,tr,th,td
        {
         border:3px solid black;
         border-collapse:collapse;
         color:white;
         padding-bottom:10px;
        }
         
    
        </style>
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
        <li><a class="nav-link scrollto active" href="adminhomepage.php">Home</a></li>
          <li><a class="nav-link scrollto" href="index1.php">customer </a></li>
           <li><a class="nav-link scrollto" href="viewowner.php">owner</a></li>
          <li><a class="nav-link scrollto " href="feedbackviewadmin.php">feedback</a></li>
          <li><a class="nav-link scrollto " href="sendnotification.php">notification</a></li>
          <li><a class="nav-link scrollto" href="turfview.php">view Turf</a></li>
          <li><a class="nav-link scrollto" href="changepassword.php">change password</a></li>

          <li><a class="nav-link scrollto" href="logout.php">logout</a></li>
          

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <br>
    <br>
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
    
    <center>
    <table class="table table-bordered">
        <tr>
          <th>turf_id</th>
            <th>turf_name</th>
            <th>turf_place</th>
            <th>amount</th> 
            <th>image</th>
            
        </tr>
        <?php
        while($row=mysqli_fetch_assoc($data))
        { 
        ?>
        <tr>
          <td><?php echo $row['turf_id'];?></td>
            <td><?php echo $row['turf_name'];?></td>
            <td><?php echo $row['turf_place'];?></td>
            <td><?php echo $row['amount'];?></td>
            
            
            <td><img src="./images/<?php echo $row['image'];?>" height="75" width="75" alt=""></td>


                
        </tr>
        <?php
        }
        ?>
    </table>
    </center>

          </div>
  </section><!-- End Hero Section -->

  <main id="main">
  </main><!-- End #main -->
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
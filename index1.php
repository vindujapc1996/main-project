<?php
session_start();
include 'connection.php';
$data=mysqli_query($con,"SELECT * FROM `customer_registration`");
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
          <li><a class="nav-link scrollto" href="book_turf.php">view Turf</a></li>
          <li><a class="nav-link scrollto" href="changepassword.php">change PASSWORD</a></li>
          <li><a class="nav-link scrollto" href="login1.php">log out</a></li>  
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <br>
      <br>
      <br>
    <center>
    <table class="table table-bordered">
        <tr>
            <th>customer_name</th>
            <th>dob</th>
            <th>email</th>
            <th>address</th>
            <th>contact</th>
            <th>approval_status</th>
            <th>image</th>
            
        </tr>
        <?php
        while($row=mysqli_fetch_assoc($data))
        { 
        ?>
        <tr>
            <td><?php echo $row['customer_name'];?></td>
            <td><?php echo $row['dob'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['contact'];?></td>
            <td><?php echo $row['approval_status'];?></td>
            <td><img src="./images/<?php echo $row['image'];?>" height="50" width="50" alt=""></td>
            <td>
              <?php
              if($row['approval_status']==0)
              {
              ?>
              <a class="btn btn-primary" href="update_status.php?id=<?php echo $row['customer_id'];?>">approve</a>
              <?php
              }
                elseif($row['approval_status']==1)
                {
                  ?>
                  <button class="btn btn-danger">approved</button>
                  <?php
                }
                ?>
                </td>
              
        </tr>
        <?php
        }
        ?>
    </table>
    </center>

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
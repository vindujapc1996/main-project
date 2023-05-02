<?php
session_start();
include 'connection.php';
$data=mysqli_query($con,"SELECT turf_id,turf_name,turf_place,amount,image FROM `turf_registration`");
?>
<!DOCTYPE html>
<html lang="en">

<head>
<style>
.card-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-evenly;
}

card {
  flex: 1 1 calc(33.33% - 20px);
  margin-bottom: 5px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 1);
  position: relative;
  overflow: hidden;
  

}

.card img {
  height: 100px;
  width: 100%;
  object-fit: cover;
}

.card-body {
  padding: 10px;
  background-color: rgba(255, 255, 255, 0.9);
}

.card-title {
    color:black;
  font-size: 24px;
  margin-bottom: 10px;
}

.card-text {
    color:black;
  font-size: 18px;
  margin-bottom: 10px;
}

.card-price {
    color:black;
  font-size: 20px;
  font-weight: bold;
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
  
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  <div class="card-container" data-aos="zoom-in" data-aos-delay="100">
    
  <?php while ($row = mysqli_fetch_assoc($data)) { ?>
  <div class="card">
    <img src="./images/<?php echo $row['image']; ?>" alt="Turf Image">
    <div class="card-body">
      <h2 class="card-title" style="color:red;"><?php echo $row['turf_name']; ?></h2>
      <p class="card-text"><?php echo $row['turf_id']; ?></p>

      <p class="card-text"><?php echo $row['turf_place']; ?></p>
      <p class="card-price">Price: <?php echo $row['amount']; ?></p>
      <a href="booknow.php?id=<?php echo $row['turf_id']?>"><button class="btn btn-primary" >book now</button></a>
    </div>
  </div>
  <?php } ?>
</div>
    
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
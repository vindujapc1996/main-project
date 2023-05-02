<?php
session_start();
include 'connection.php';
$owner_id=$_SESSION['id'];
$sql="SELECT * FROM `owner_registration` WHERE `owner_id`='$owner_id'";
$result=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .card{
        color:black;
        border: radius 80px;
  
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
        <li><a class="nav-link scrollto active" href="ownerhomepage.php">Home</a></li>
          <li><a class="nav-link scrollto" href="ownerprofile.php">profile view </a></li>
           <li><a class="nav-link scrollto" href="turf_registration.php">turf register</a></li>
          <li><a class="nav-link scrollto " href="viewturf2.php">view turf</a></li>
          <li><a class="nav-link scrollto" href="viewbooking_owner.php">view booked turf</a></li>
          <li><a class="nav-link scrollto" href="logout.php">log out</a></li> 

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    
    <div class="container">
      <div class="row">
  <?php
 if(mysqli_num_rows($result)>0)
{
  while($row=mysqli_fetch_assoc($result))
  {
    ?>
    <div class="card" style="width:25%; margin-top:10%; margin-left:500px;">
    <div class="form-group mt-4">
   <?php echo '<img src="./images/'.$row["image"].'" alt="ownerimage" style="width:200px; height:200px;">';?>
   </div>
  
   <div class="form-group mt-4">
   <?php echo "owner_name:".$row["owner_name"]."<br>";?>
   </div>
   <div class="form-group mt-4">
   <?php echo "address:".$row["address"]."<br>";?>
   </div>
   <div class="form-group mt-4">
   <?php echo "email:".$row["email"]."<br>";?>
   </div>
   <div class="form-group mt-4">
    <?php echo "contact:".$row["contact"]."<br>";?>
    </div>
    
   
   <div class="form-group mt-4">
   <a class="btn btn-primary" href="owner_profile_edit.php?id=<?php echo $row['owner_id']?>">EDIT</a>
   </div>
   
   
  
  </div>
   <?php
  }
}
else{
  echo "no result found";
}
mysqli_close($con);
?>
</div>
</div>

  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <!-- End About Section -->  
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
        
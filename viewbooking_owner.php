<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['id']))
{
    header('location:login1.php');
}
else{
    $id1=$_SESSION['id'];
    $sql=mysqli_query($con,"SELECT booking_tb.book_id,booking_tb.from_date,booking_tb.to_date,customer_registration.customer_name,customer_registration.contact,turf_registration.turf_name,payment_tb.status, payment_tb.amount FROM booking_tb
     INNER JOIN customer_registration ON booking_tb.customer_id=customer_registration.customer_id 
     INNER JOIN turf_registration ON booking_tb.turf_id=turf_registration.turf_id 
     INNER JOIN payment_tb ON booking_tb.payment_id=payment_tb.payment_id WHERE owner_id='$id1'");
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
<style>
    table,tr,th,td
        {
         border:2px solid black;
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
        <li><a class="nav-link scrollto active" href="ownerhomepage.php">Home</a></li>
          <li><a class="nav-link scrollto" href="ownerprofile.php">profile view </a></li>
           <li><a class="nav-link scrollto" href="turf_registration.php">turf register</a></li>
          <li><a class="nav-link scrollto " href="turfview.php">view turf</a></li>
          <li><a class="nav-link scrollto" href="viewbooking_owner.php">view booked turf</a></li>
          <li><a class="nav-link scrollto" href="logout.php">log out</a></li> 

                          </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
  <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
    <div class="row">
    <table class="table table-bordered" style="margin-top:5%;">
        <tr>
            <th>BOOKING ID</th>
            <th>TURF NAME</th>
            <th>FROM DATE</th>
            <th>TO DATE</th>
            <th>CUSTOMER NAME</th>
            <th>AMOUNT</th>
            <th>PAYMENT STATUS</th>
            
        </tr>
        <?php
        while($row=mysqli_fetch_assoc($sql))
        {
            ?>
        <tr>
            <td><?php echo $row['book_id'];?></td>
            <td><?php echo $row['turf_name'];?></td>
            <td><?php echo $row['from_date'];?></td>
            <td><?php echo $row['to_date'];?></td>
            <td><?php echo $row['customer_name'];?></td>
            <td><?php echo $row['amount'];?></td>
            <td><?php echo $row['status'];?></td>
 
            

        </tr>
        <?php
        }
        ?>

    </table>
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
<?php }
?>
        
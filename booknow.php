<?php
session_start();
include 'connection.php';
if(isset($_SESSION['id']))

// {
//   header('location:login1.php');
// }
// else
{
  $id1=$_GET['id'];
  $result=mysqli_query($con,"SELECT turf_id,turf_name,turf_place,image,amount FROM `turf_registration` where turf_id='$id1'");
  if(isset($_POST['submit']))
  {
    $from_date=$_POST['from_date'];
    $to_date=$_POST['to_date'];
    $id=$_SESSION['id'];
    $sql1=mysqli_query($con,"SELECT * FROM `booking_tb` WHERE turf_id='$id1' AND from_date <='$to_date' AND to_date >='$from_date'");
    if(mysqli_num_rows($sql1)>0)
    {
      echo "<script>alert('sorry.this date is already booked.')</script>";
    }
    else
    {
$sql=mysqli_query($con,"INSERT INTO `booking_tb`(`from_date`,`to_date`,`turf_id`,`customer_id`)VALUES('$from_date','$to_date','$id1','$id')");
$book=mysqli_insert_id($con);
$_SESSION['book_id']=$book;
if(($sql==TRUE))
{
echo '<script>alert("sucessfully booked")</script>';
    header('location:payment.php');
  }
  else {
    echo "error: " . $sql . "<br>" . $con->error;

  }
}
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .nova{
      color:red;
      
    }
    .card{
       text-align:center;
       
            
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
           <li><a class="nav-link scrollto" href="#team">notification</a></li>
         
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
    <center>  <form method="POST" required>
       <div class="container">
       <div class="card" style="width: 400px; height: 695px; background-color: #e8f5e9;">


                  <?php
          while ($row=mysqli_fetch_assoc($result))
          {
            ?>
            <div class="form-group mt-4">
              <div class="nova">
                <?php echo'<img src="./images/'.$row["image"].'" alt="customer image" height="300px" width="300px">';?>
                </div>
                </div>
                <div class="form-group mt-4">
              <div class="nova">
                <?php echo"turf_id:". $row["turf_id"]."<br>";?>
                </div>
                </div>
                <div class="form-group mt-4">
              <div class="nova">
                <?php echo"turf_name:". $row["turf_name"]."<br>";?>
                </div>
                </div>
                <div class="form-group mt-4">
              <div class="nova">
                <?php echo"turf_place:". $row["turf_place"]."<br>";?>
                </div>
                </div>
                <div class="form-group mt-4">
              <div class="nova">
                <?php echo"amount:". $row["amount"]."<br>";?>
                </div>
                </div>
                <div class="form-group mt-4">
              <div class="nova">
                <label>from_date</label>
                <input type="date" name="from_date"  placeholder="from_date" required>
                </div>
                </div>
                <div class="form-group mt-4">
              <div class="nova">
              <label>to_date</label>
                <input type="date" name="to_date"  placeholder="to_date" required>

                             </div>
                </div>
                <div class="form-group mt-4">
              <div class="nova">
                
               <a href="payment.php"> <input type="submit" name="submit" class="btn btn-primary" value="submit"></a>
                </div>
                </div>
          </div>
          </form>
          </center>

          </div>
          <?php
          }
          ?>
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
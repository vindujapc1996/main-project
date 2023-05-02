<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['id']))
{
    header('location:login1.php');
    
}
else
{
  $id1=$_SESSION['id'];
    $sql=mysqli_query($con,"SELECT turf_registration.amount,booking_tb.book_id,booking_tb.customer_id FROM turf_registration INNER JOIN booking_tb ON turf_registration.turf_id=booking_tb.turf_id WHERE customer_id='$id1' order by book_id desc");
  
    $row=mysqli_fetch_assoc($sql);
  

  
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
<style>
  .confetti-button {
    display: inline-block;
    position: relative;
    padding: 10px 20px;
    background-color: #f44336;
    color: #fff;
    font-size: 16px;
    text-align: center;
    text-decoration: none;
    border-radius: 4px;
    overflow: hidden;
    transition: background-color 0.3s ease;
  }

  .confetti-button:hover {
    background-color: #ff5722;
  }

  .confetti-button::after {
    content: "";
    position: absolute;
    top: -20px;
    left: 0;
    width: 100%;
    height: 20px;
    background-image: url('https://cdn.pixabay.com/photo/2017/12/29/16/41/confetti-3046658_1280.png');
    background-repeat: repeat-x;
    animation: confetti-fall 2s linear infinite;
  }

  @keyframes confetti-fall {
    0% {
      transform: translateY(-100%);
    }
    100% {
      transform: translateY(100%);
    }
  }
  .card{
    background-image: url('https://thumbs.gfycat.com/CorruptBriefGreatwhiteshark-max-1mb.gif');
    background-repeat: no-repeat;
    background-size: cover;
    animation: background-animation 10s infinite;
    border-radius:30px;
  }

  

  
  </style>

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
    <div class="hero-container">
        <div class="row">
            <div class="card" style="height:130%; width:100%;">
            <form  method="POST" required>
              <br>
              <br>
                <br>
                <input type="number" name="amount" value="<?php echo $row['amount'];?>">
                <br>
                <br>
                  <p style="color:red;">status</p>
                 <input type="radio" id="html" name="status" value="paid">
                <label for="html" style="color:red;">paid</label>
                <input type="radio" id="css" name="status" value="unpaid">
                <label for="html" style="color:red;">unpaid</label>
                <br>
                <br>
             <input class="confetti-button" type="submit" name="submit">
            </form>

            </div>
        </div>
</div>

</section>
  
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
<?php 
if(isset($_POST['submit']))
{
  $id1=$_SESSION['id'];
  $status=$_POST['status'];
  $amount=$_POST['amount'];
  $book_id=$_SESSION['book_id'];
  mysqli_query($con,"INSERT INTO `payment_tb`(`customer_id`,`book_id`,`amount`,`status`)VALUES('$id1','$book_id','$amount','$status')");
  $pay=mysqli_insert_id($con);
  $result=mysqli_query($con,"UPDATE `booking_tb` SET `payment_id`='$pay' WHERE customer_id='$id1' AND book_id='$book_id'");
  if($result)
  {
    echo'<script>alert("booking successfull")</script>';
    header('location:book_turf.php');
      
}
}
}
?>

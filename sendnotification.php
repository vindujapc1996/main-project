<?php
session_start();
include 'connection.php';
$data = mysqli_query($con, "SELECT * FROM `customer_registration`");
if (isset($_POST['send'])) {
    $customer_id = $_POST['customer_id'];
    $notification = $_POST['notification'];
    $sql = "INSERT INTO `notification_tb` (`customer_id`, `notification`) VALUES ('$customer_id', '$notification')";
    if (mysqli_query($con, $sql)) {
        $_SESSION['notification_sent'] = true; // Set a session variable to indicate successful submission
        header("Location: sendnotification.php"); // Redirect the user to a success page
        exit;
        echo '<script>alert("notification sent successfully")</script>';
    } else {
        echo '<script>alert("notification sent successfully")</script>';

           }
           echo "error sending notification: " . mysqli_error($con);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
                
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
        <li><a class="nav-link scrollto " href="adminhomepage.php">Home</a></li>
          <li><a class="nav-link scrollto" href="index1.php">customer </a></li>
           <li><a class="nav-link scrollto" href="viewowner.php">owner</a></li>
          <li><a class="nav-link scrollto " href="feedbackviewadmin.php">feedback</a></li>
          <li><a class="nav-link scrollto active " href="sendnotification.php">notification</a></li>
          <li><a class="nav-link scrollto" href="turfview.php">view Turf</a></li>
          <li><a class="nav-link scrollto" href="changepassword.php">change PASSWORD</a></li>
          <li><a class="nav-link scrollto" href="logout.php">log out</a></li> 

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
      
  <form action="" method="POST">
    <div class="hero-container">
        <div class="card" style="width: 50%; margin: 0 auto; boredr-radius:">
            <h2 style="text-align: center; color:red;">SEND NOTIFICATION</h2>
            <div class="form-group mt-4" style="text-align: center;">
                <div class="nova">
                    <label for="customer_id" style="color:red;">Select Customer:</label>
                    <select name="customer_id" id="customer_id">
                        <?php
                        while ($row = mysqli_fetch_assoc($data)) {
                            echo "<option value='" . $row['customer_id'] . "'>" . $row['customer_name'] . " (ID: " . $row['customer_id'] . ")</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group mt-4" style="text-align: center;">
                <div class="nova">
                    <label for="notification" style="color: red;">Notification:</label>
                    <input type="text" id="notification" name="notification" placeholder="Enter notification message" required>
                </div>
            </div>
            <div class="form-group mt-4" style="text-align: center;">
                <div class="nova">
                    <input type="submit" class="btn btn-primary" name="send" value="Send">
                </div>
            </div>
        </div>
    </div>
</form>

    
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
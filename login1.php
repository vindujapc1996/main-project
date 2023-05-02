<?php
session_start();
include 'connection.php';

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = $_POST['type'];
    
    $data = mysqli_query($con, "SELECT * FROM `login_tb` WHERE username='$username'");
    
    if ($data) {
        $row = mysqli_fetch_assoc($data);
        $hash = password_verify($password, $row['password']);
        $count = mysqli_num_rows($data);
        $type=$row['type'];

        if ($count == 1 && $type == 'admin' && $hash == $password) {
            $_SESSION['id'] = $row['login_id'];
            $id = $_SESSION['id'];
            header("location:adminhomepage.php");
        }
        elseif ($count == 1 && $type == 'customer' && $hash == $password) {
          $_SESSION['id'] = $row['login_id'];
            $id = $_SESSION['id'];
         $ara=mysqli_query($con,"SELECT `approval_status` FROM `customer_registration` WHERE `customer_id`='$id'");
           
        $row1=mysqli_fetch_assoc($ara);
        if($row1['approval_status']==1)
        {
          header("location:customerhomepage.php");
        }
        else{
          echo " you need admin approval";
        }
       } elseif ($count == 1 && $type == 'owner' && $hash == $password)
        {
          $_SESSION['id'] = $row['login_id'];
          $id = $_SESSION['id'];
        $ara=mysqli_query($con,"SELECT `approval_status` FROM `owner_registration` WHERE `owner_id`='$id'");
         $row1=mysqli_fetch_assoc($ara);
         if($row1['approval_status']==1)
         {
          header("location:ownerhomepage.php");
         }
         else
         {
          echo "you need admin approval";
         }
       }
       else{
        echo "invalid id and password";
       }
      }
           
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
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
           <!-- <li><a class="nav-link scrollto" href="">login </a></li> -->
           <!-- <li><a class="nav-link scrollto" href="">owner</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">feedback</a></li>
          <li><a class="nav-link scrollto" href="#team">Turf</a></li>
          <li><a class="nav-link scrollto" href="#team">change </a></li> -->
          <li><a class="nav-link scrollto" href="logout.php">log out</a></li>  
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
    <form action="" method="POST" onsubmit="return valid()" required>
    <div class="card-body p-5 text-center">

<h3 class="mb-5">Sign in</h3>

<div class="form-check d-flex justify-content-start mb-4">
<select class="button btn btn-primary" name="type">
<!-- <option selected>Open this select menu</option> -->
 <option value="owner">owner</option>
<option value="admin">admin</option>
 <option value="customer">customer</option>
</select>
</div>

<div class="form-outline mb-4">
  <input type="email" id="username" name="username" class="form-control form-control-lg" placeholder="username" onkeyup="clearmsg('sp1')"/><br><span style="color:red;"  id="sp1"></span>
  
</div>

<div class="form-outline mb-4">
  <input type="password" id="password"  name="password" class="form-control form-control-lg" placeholder="password" onkeyup="clearmsg('sp2')"/><br><span style="color:red;"  id="sp2"></span>

</div>

<!-- Checkbox -->

<button class="btn btn-primary btn-lg btn-block" type="submit" onclick="return valid()" name="submit" value="submit">login</button>

<hr class="my-4">

 <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b56;"
  type="submit"><a href="customer-registration.php"> customer registration</a></button>
  <br>
  <br>
<button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5888;"
  type="submit">  <a href="ownerregistration.php"> owner registration </a></button>

</div>
</form>
  <script>
function valid()
{
var username=document.getElementById("username").value;
var password=document.getElementById("password").value;
if (username == null || username == "") {
    document.getElementById("sp1").innerHTML = "Please enter username";
    return false;
  }
  if (password == null || password == "") {
    document.getElementById("sp2").innerHTML = "Please enter your password";
    return false;
  }
  return true;
  }
  function clearmsg(sp)
  {
    document.getElementById(sp).innerHTML="";
  }

</script>
    
      
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
<?php
session_start();
include 'connection.php';

  $id1=$_SESSION['id'];
  $data=mysqli_query($con,"SELECT * FROM `login_tb` WHERE login_id='$id1'");
  $row=mysqli_fetch_assoc($data);

if(isset($_POST['submit']))
{
    $password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $hash=password_hash($new_password,PASSWORD_DEFAULT);
    if(password_verify($password,$row['password'])){
$sql=mysqli_query($con,"UPDATE login_tb SET password='$hash' WHERE login_id='$id1'");
if($sql){
  echo "<script>alert('password updated successfully')</script>";
}else{
  echo "error updating password:".mysqli_error($con);
}
    }else{
      echo "old password doesnot match.please try again.";
    }
  }

    $con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    card{
     
  background-color: #808080;


      

      

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
          <li><a class="nav-link scrollto" href="changepassword.php">change PASSWORD</a></li>
          <li><a class="nav-link scrollto" href="login1.php">log out</a></li> 
 
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
  <div class="container">
      <div class="row">
      <div class="card" style="width:30%;  margin-top:20%; margin-left:500px;  border-radius: 30px; ">
 
  <form action="" method="POST" onsubmit="return valid()" required>
    <br>
    
  <label for="current_password" style="color:red;">Current Password:</label>
  <input type="password"  name="old_password" id="old_password" onkeyup="clearmsg('sp1')"/><br><span style="color:red;" * id="sp1"></span><br>
<br>
  <label for="new_password" style="color:red;">New Password:</label>
  <input type="password"   name="new_password" id="new_password" onkeyup="clearmsg('sp2')"/><br><span style="color:red;" * id="sp2"></span>

   <br>
   <br>
<center>
  <input type="submit" class="btn btn-primary" onclick="return valid()" name="submit" value="submit">
  </center>
</div>
</div>
</div>
</form>
<script>
  
function valid()
{
var old_password=document.getElementById("old_password").value;
var new_password=document.getElementById("new_password").value;

if (old_password==null || old_password=="")
{
document.getElementById("sp1").innerHTML="* please enter your old_password";
return false;

}
if (new_password==null || new_password=="")
{
document.getElementById("sp2").innerHTML=" * please enter your new_password";
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
        
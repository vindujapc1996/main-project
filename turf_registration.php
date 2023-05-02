<?php
session_start();
include 'connection.php';
if(isset($_POST['submit']))
{
  $turf_name=$_POST['turf_name'];
  $turf_place=$_POST['turf_place'];
  $amount=$_POST['amount'];
  $image=$_FILES['image']['name'];
  
  if($image!="")
  {
    $filearray=pathinfo($_FILES['image']['name']);
    $file1=rand();
    $file_ext=$filearray["extension"];
    $filenew=$file1 .".".$file_ext;

    move_uploaded_file($_FILES['image']['tmp_name'],"images/".$filenew);
  }
  else{
    echo "<script> alert('try again')</script>";
  }
   $id1=$_SESSION['id'];
  $sql="INSERT INTO `turf_registration`(`turf_name`, `turf_place`, `amount`, `image`,`owner_id`) VALUES ('$turf_name','$turf_place','$amount','$filenew','$id1')";
  if(mysqli_query($con,$sql)){
    echo"<script>alert('data uploaded successfully')</script>";
  }else{
    echo "error:".$sql."<br>".mysqli_error($conn);
  }
  mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .card{
      background:url('https://media.istockphoto.com/id/1256863126/video/green-artificial-grass-texture-animated.jpg?s=480x480&k=20&c=hK-nR_BGwK_lSGH6H-2rQY2eu6rK0szgCFhkgQCCCY0=');
      background-repeat:no-repeat;
      background-size: 700px 500px; 
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
    <form  method="POST" enctype="multipart/form-data" onsubmit="return valid();" required >
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
    <div class="card" style="border-radius: 30px;">

  <div class="card-body">
    <h2 style="color:red">Turf Registration</h2>
    <input type="text" name="turf_name" id="turf_name" placeholder="turf_name" onkeyup="clearmsg('sp1')"/><br><span style="color:red;"  id="sp1"></span>
    <br>
    <br>
    <input type="text" name="turf_place" id="turf_place" placeholder="turf_place" onkeyup="clearmsg('sp2')"/><br><span style="color:red;"  id="sp2"></span>
     <br>
     <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file"  name="image" id="file"  >
    <br>
    <br>
    <input type="text" name="amount" id="amount" placeholder="amount" onkeyup="clearmsg('sp3')"/><br><span style="color:red;" id="sp3"></span>
    <br>
    <br>
   

    <br>
    <br>
    <center> <button  name="submit" onclick="return valid()" value="submit"> submit </button></center>
  </div>
</div>
</form>
<script>
   function valid() {
  var turf_name = document.getElementById("turf_name").value;
  var turf_place = document.getElementById("turf_place").value;
  var amount = document.getElementById("amount").value;

  if (turf_name == null || turf_name == "") {
    document.getElementById("sp1").innerHTML = "Please enter turf_name";
    return false;
  }
  if (turf_place == null || turf_place == "") {
    document.getElementById("sp2").innerHTML = "Please enter turf_place";
    return false;
  }
  if (amount == null || amount == "") {
    document.getElementById("sp3").innerHTML = "Please enter amount";
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
<?php
session_start();
include 'connection.php';
$id1=$_GET['id'];

$data=mysqli_query($con,"SELECT * FROM `customer_registration` WHERE `customer_id`='$id1'");
$row=mysqli_fetch_assoc($data);

if(isset($_POST['submit']))
{
$customer_name=$_POST['customer_name'];
$dob=$_POST['dob'];
$email=$_POST['email'];
$address=$_POST['address'];
$contact=$_POST['contact'];
$pic=$_FILES['f1']['name'];
  
if($pic!="")
{
  $filearray=pathinfo($_FILES['f1']['name']);
  $file1=rand();
  $file_ext=$filearray["extension"];
  $filenew=$file1 .".".$file_ext;
  move_uploaded_file($_FILES['f1']['tmp_name'],"images/".$filenew);
  
}
mysqli_query($con,"UPDATE customer_registration SET customer_name='$customer_name',dob='$dob',email='$email',address='$address',contact='$contact',image='$filenew' WHERE `customer_id`='$id1'");
echo '<script>alert("Update successful")</script>';

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
        <a href="index.html"> <h2> TURF MANAGEMENT </h2></a>
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
  <div class="container">
      <div class="row">
      <div class="card" style="width:25%; margin-top:80px; margin-left:400px;">
      <form method="POST" enctype="multipart/form-data" onsubmit="return valid()" required>


         <div class="form-group mt-4">
   <input type="text" name="customer_name" id="customer_name"  value="<?php echo $row['customer_name'];?>" onkeyup="clearmsg('sp1')"/><br><span style="color:red;"  id="sp1"></span>

   </div>
   <div class="form-group mt-4">
   <input type="date" name="dob" id="dob"  value="<?php echo $row['dob'];?>" onkeyup="clearmsg('sp2')" /><br><span style="color:red;"  id="sp2"></span>
   </div>
   <div class="form-group mt-4">
   <input type="text" name="email" id="email" value="<?php echo $row['email']; ?>" onkeyup="clearmsg('sp3')"/><br>
<span style="color:red;" id="sp3"></span>

      </div>
   <div class="form-group mt-4">
   <input type="text" name="address" id="address" value="<?php echo $row['address'];?>" onkeyup="clearmsg('sp4')"/><br><span style="color:red;"  id="sp4"></span>
    </div>
    <div class="form-group mt-4">
    <input type="number" name="contact" id="contact" value="<?php echo $row['contact']; ?>" onkeyup="clearmsg('sp5')" /><br>
<span style="color:red;" id="sp5"></span>

       </div>
    <div class="form-group mt-4">
     <input type="file" name="f1" id="f1" required>
   </div>

    

    
      <div class="form-group mt-4">
        <button class="button" type="submit" onclick="return valid()"  id="submit" name="submit">update</button>
   </div>
   <center>
  <div class="form-group mt-4">
    <a href="customer-profile.php" class="btn btn-danger">Back</a>
  </div>
</center>

  </div>
</div>
  </form>
</section>
<script>
function valid()
{
var customer_name=document.getElementById("customer_name").value;
var dob=document.getElementById("dob").value;
var email=document.getElementById("email").value;
var address=document.getElementById("address").value;
var contact=document.getElementById("contact").value;



if (customer_name==null || customer_name=="")
{
document.getElementById("sp1").innerHTML="please enter your name";
return false;

}
if (dob==null || dob=="")
{
document.getElementById("sp2").innerHTML="please enter your dob";
return false;
}
if(email==null || email=="")
{
document.getElementById("sp3").innerHTML="please enter your email";
return false;
}
if(address==null || address=="")
{
document.getElementById("sp4").innerHTML="please enter your address";
return false;
}
if(contact==null || contact=="")
{
document.getElementById("sp5").innerHTML=" please enter your contact";
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
<?php
include 'connection.php';
if(isset($_POST['submit']))
{
$customer_name=$_POST['name'];
$dob=$_POST['dob'];
$email=$_POST['email'];
$address=$_POST['address'];
$contact_no=$_POST['contact_no'];
$username=$_POST['email'];
$password=$_POST['password'];
$unencrypted_password="$password";
$hash=password_hash($unencrypted_password,PASSWORD_DEFAULT);
$image=$_FILES['image']['name'];
  
if($image!="")
{
  $filearray=pathinfo($_FILES['image']['name']);
  $file1=rand();
  $file_ext=$filearray["extension"];
  $filenew=$file1 .".".$file_ext;
  
  
  move_uploaded_file($_FILES['image']['tmp_name'],"images/".$filenew);
  
}

else
{
echo'<script>alert("try again please")</script>';
}

mysqli_query($con,"INSERT INTO customer_registration(customer_name,dob,email,address,contact,approval_status,image) VALUES('$customer_name','$dob','$email','$address','$contact_no','0','$filenew')");
$log=mysqli_insert_id($con);
$sql=mysqli_query($con,"INSERT INTO login_tb(login_id,username,password,type) VALUES('$log','$username','$hash','customer')");
if($sql)
{
  
  echo'<script>alert("registered sucessfully"); </script>';  
  ?>
  <script>window.location.assign('customer-registration.php');</script>
  <?php
}
else
{
  echo "Something wrong";
 
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
        <a href="index.html"> <h2> TURF MANAGEMENT </h2></a>
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="index.html">Regna</a></h1>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <!-- <li><a class="nav-link scrollto active" href="adminhomepage.php">Home</a></li>
          <li><a class="nav-link scrollto" href="#services">customer </a></li>
           <li><a class="nav-link scrollto" href="viewowner.php">owner</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">feedback</a></li>
          <li><a class="nav-link scrollto" href="#team">Turf</a></li>  -->
          <li><a class="nav-link scrollto" href="">home</a></li> 
          <li><a class="nav-link scrollto" href="logout.php">log out</a></li> 
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-60">
      <div class="row d-flex justify-content-center align-items-center h-60">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">

  <div class="card" style="border-radius: 6px;  background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/Football_%28soccer_ball%29.svg/1200px-Football_%28soccer_ball%29.svg.png');">
            <div class="card-body p-9"  >
  
              <h2 class="text-uppercase text-center mb-5" style="color:black;">registration form</h2>

              <form name="myform"  method="POST" enctype="multipart/form-data" onsubmit="return valid()" required>

                
                  <input type="text" id="name" name="name" onkeyup="clearmsg('sp1')"  class="form-control form-control-lg" placeholder="enter your name" /><span style="color:red;"  id="sp1"></span>
                   <br>
            <input type="date" id="dob" name="dob" onkeyup="clearmsg('sp2')" class="form-control form-control-lg" placeholder="enter your dob" /><span style="color:red;" id="sp2"></span>
                          <br>
        <input type="email" id="email" name="email" onkeyup="clearmsg('sp3')" class="form-control form-control-lg" placeholder="enter your mail email" /><span style="color:red;" id="sp3"></span>
         <br>         
      <input type="text" id="address" name="address" onkeyup="clearmsg('sp4')" class="form-control form-control-lg" placeholder="enter your address" /><span style="color:red;" id="sp4"></span>
         <br>        
     <input type="text" id="contact_no"  onkeyup="clearmsg('sp5')"  class="form-control form-control-lg"  name="contact_no" placeholder="enter your contact_no" /><span style="color:red;" id="sp5"></span>
          <br>        
     <input type="text" id="username" name="username" onkeyup="clearmsg('sp6')"  class="form-control form-control-lg" placeholder="enter your username" /><span style="color:red;" id="sp6"></span>
           <br>     
   <input type="password" id="password" name="password" onkeyup="clearmsg('sp7')" class="form-control form-control-lg" placeholder="enter your password" /><span style="color:red;" id="sp7"></span>
   <br>
   <br>

   <input type="file" id="file" name="image">
   
   
                  
                   <br>
            <br>
                  <button onclick="return valid(); return false;" name="submit">submit</button>
                    
              
                 
              </form>
              </div>
             </div>

              </div>
             </div>
              </div>
            </div>
            </section>
            <script>
    function valid()
    {
      var name=document.getElementById("name").value;
    var dob=document.getElementById("dob").value;
    var email=document.getElementById("email").value;
    var address=document.getElementById("address").value;
    var contact_no=document.getElementById("contact_no").value;
    var username=document.getElementById("username").value;
    var password=document.getElementById("password").value;

    
    if (name==null || name=="")
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
    if(contact_no==null || contact_no=="")
    {
      document.getElementById("sp5").innerHTML=" please enter your contact_no";
      return false;
    }
    if(username==null || username=="")
    {
      document.getElementById("sp6").innerHTML="please enter your username";
    return false;
    }
    if(password==null || password=="")
    {
      document.getElementById("sp7").innerHTML="please enter your pasword";
      return false;
    }
   return true;
  }
  function clearmsg(sp)
  {
    document.getElementById(sp).innerHTML="";
  }
    
  
  </script>
      <!-- <h1>Welcome to Regna</h1>
      <h2>We are team of talented designers making websites with Bootstrap</h2>
      <a href="#about" class="btn-get-started">Get Started</a> -->
    
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
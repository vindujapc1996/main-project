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

mysqli_query($con,"INSERT INTO customer_registration(customer_name,dob,email,address,contact,approval_status,images) VALUES('$customer_name','$dob','$email','$address','$contact_no','0','$filenew')");
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

  <!-- =======================================================
  * Template Name: Regna
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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

    <!-- ======= About Section ======= -->
    <!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    <!-- <section id="facts">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Facts</h3>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>
        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
            <p>Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="534" data-purecounter-duration="1" class="purecounter"></span>
            <p>Projects</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
            <p>Hours Of Support</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
            <p>Hard Workers</p>
          </div>

        </div>

      </div>
    </section>End Facts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services">
      <!-- <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Services</h3>
          <p class="section-description">provides our best services and good support</p>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href=""><i class="bi bi-briefcase"></i></a></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href=""><i class="bi bi-card-checklist"></i></a></div>
              <h4 class="title"><a href="">Dolor Sitema</a></h4>
              <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href=""><i class="bi bi-bar-chart"></i></a></div>
              <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>
          </div> -->

          <!-- <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href=""><i class="bi bi-binoculars"></i></a></div>
              <h4 class="title"><a href="">Magni Dolores</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href=""><i class="bi bi-brightness-high"></i></a></div>
              <h4 class="title"><a href="">Nemo Enim</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href=""><i class="bi bi-calendar4-week"></i></a></div>
              <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
              <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
            </div>
          </div>
        </div>

      </div> -->
    </section><!-- End Services Section -->

    <!-- ======= Call To Action Section ======= -->
    <!-- End Call To Action Section -->

    <!-- ======= Portfolio Section ======= -->
    <!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="Registration">
    
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact">
      <div class="container">
        <div class="section-header">
          <h3 class="section-title">Contact</h3>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>
      </div>

      <!-- Uncomment below if you wan to use dynamic maps -->
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>

      <div class="container mt-5">
        <div class="row justify-content-center">

          <div class="col-lg-3 col-md-4">

            <div class="info">
              <div>
                <i class="bi bi-geo-alt"></i>
                <p>A108 Adam Street<br>New York, NY 535022</p>
              </div>

              <div>
                <i class="bi bi-envelope"></i>
                <p>info@example.com</p>
              </div>

              <div>
                <i class="bi bi-phone"></i>
                <p>+1 5589 55488 55s</p>
              </div>
            </div>

            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="form-group mt-3">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Regna</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
      -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

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
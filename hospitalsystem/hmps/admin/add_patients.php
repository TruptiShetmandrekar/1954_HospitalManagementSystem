<?php
include_once('include/config.php');
if(isset($_POST['submit']))
{
$fname=$_POST['full_name'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$query=$conn->query("insert into patient(fullname,address,city,gender,email,password) values('$fname','$address','$city','$gender','$email','$password')");
if($query)
{
  echo "<script>alert('Successfully Registered. You can login now');</script>";
  //header('location:user-login.php');
}
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Hospital Management System</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
  <script type="text/javascript">
function valid()
{
 if(document.adddoc.npass.value!= document.adddoc.cfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.adddoc.cfpass.focus();
return false;
}
return true;
}
</script>

</head>
<body>
  <!-- Sidenav -->
  <!-- Sidenav -->

    <!-- Topnav -->
     <?php include('include/sidebar.php');?> 
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include('include/header.php');?>
    
    <!-- Header -->
    <!-- Header -->


    <!-- Header -->
    <!-- Header -->


    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Admin</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Admin</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="col-xl-8 container-fluid mt--6 ">
          <div class="card">
            <div class="card-header">
                  
                  <div class="row margin-top-30">
                    <div class="col-lg-8 col-md-12">
                      <div class="panel panel-white">
                        <div class="panel-heading">
                          <h4 class="card-title">Register</h4>
              <form method="POST" class="my-login-validation" novalidate="">
                <p>
                Enter your Patient personal details below:
              </p>
              <div class="form-group">
                <input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Address" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="city" placeholder="City" required>
              </div>
              <div class="form-group">
                <label class="block ">
                  Gender
                </label>
                <div class="clip-radio radio-primary">
                  <input type="radio" id="rg-female" name="gender" value="female" >
                  <label for="rg-female">
                    Female
                  </label>
                  <input type="radio" id="rg-male" name="gender" value="male">
                  <label for="rg-male">
                    Male
                  </label>

                   <input type="radio" id="other" name="gender" value="other">
                    <label for="other">Other</label>
                </div>
              </div>
              <p>
                Enter Patient account details below:
              </p>
              <div class="form-group">
                <span class="input-icon">
                  <input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()"  placeholder="Email" required>
                  <i class="fa fa-envelope"></i> </span>
                   <span id="user-availability-status1" style="font-size:12px;"></span>
              </div>
              <div class="form-group">
                <span class="input-icon">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                  <i class="fa fa-lock"></i> </span>
              </div>
              <div class="form-group">
                <span class="input-icon">
                  <input type="password" class="form-control" name="password_again" placeholder="Password Again" required>
                  <i class="fa fa-lock"></i> </span>
              </div>
                <div class="form-group">
                  <div class="custom-checkbox custom-control">
                    <input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
                    <label for="agree" class="custom-control-label">I agree to the <a href="#">Terms and Conditions</a></label>
                    <div class="invalid-feedback">
                      You must agree with our Terms and Conditions
                    </div>
                  </div>
                </div>

                <div class="form-group m-0">
                  <button  name="submit"  id="submit" type="submit" class="btn btn-primary btn-block">
                    Register
                  </button>
                </div>
                <div class="mt-4 text-center">
                  Already have an account? <a href="index.php">Login</a>
                </div>
              </form>
            </div>
                      </div>
                    </div>
                      
                      </div>
                    </div>
                  <div class="col-lg-12 col-md-12">
                      <div class="panel panel-white">
                        
                        
                      </div>
                    </div>
                  </div>
                </div>
      </div>
      <!-- Footer -->
<?php include('include/footer.php');?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>


e
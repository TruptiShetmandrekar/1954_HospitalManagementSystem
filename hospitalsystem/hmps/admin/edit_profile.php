<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{

$email=$_POST['email'];
$sql=$conn->query("Update admin set email='$email' where email='".$_SESSION['login']."'");
if($sql)
{
echo "<script>alert(' Details updated Successfully now you have to login again ');</script>";

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
<?php include('include/sidebar.php');?>  
<div class="main-content" id="panel">
  <!-- Main content -->
 <?php include('include/header.php');?>
    <!-- Header -->


  <!-- Sidenav -->
  
  <!-- Main content -->

    <!-- Topnav -->
    
    <!-- Header -->
    <!-- Header -->


    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
           <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">
                  Admin</h6>
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
    <!-- Page content -->
    <div class="col-xl-8 container-fluid mt--6 ">
          <div class="card">
            <div class="card-header">
                  
                  <div class="row margin-top-30">
                    <div class="col-lg-8 col-md-12">
                      <div class="panel panel-white">
                        <div class="panel-heading">
                          <h5 class="panel-title">Edit Profile</h5>
                        </div>
                        <div class="panel-body">
                  
                         <?php $sql=$conn->query("select * from admin where email='".$_SESSION['login']."'");
while($data=mysqli_fetch_array($sql))
{
?>
                          <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                            

  


<div class="form-group">
                  <label for="fess">
                                  Email
                              </label>
          <input type="email" name="email" class="form-control"   required="required"  value="<?php echo htmlentities($data['email']);?>">
                            </div>



                            
                            <?php } ?>
                            
                            
                            <button type="submit" name="submit" class="btn btn-o btn-primary">
                              Update
                            </button>
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



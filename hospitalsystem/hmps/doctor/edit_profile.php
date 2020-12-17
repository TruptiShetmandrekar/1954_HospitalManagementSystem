<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
if(isset($_POST['submit']))
{
  $docspecialization=$_POST['Doctorspecialization'];
$docname=$_POST['docname'];
$docaddress=$_POST['clinicaddress'];
$docfees=$_POST['docfees'];
$doccontactno=$_POST['doccontact'];
$docemail=$_POST['docemail'];
$sql=$conn->query("Update doctors set specilization='$docspecialization',doctorName='$docname',address='$docaddress',docFees='$docfees',contactno='$doccontactno',docEmail='$docemail' where docEmail='".$_SESSION['login']."'");
if($sql)
{
echo "<script>alert('Doctor Details updated Successfully');</script>";

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
  <!-- Main content -->
 <?php include('include/header.php');?>
    <!-- Header -->


  <!-- Sidenav -->
  
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    
    <!-- Header -->
    <!-- Header -->


    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
           <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">
                  <?php $query=$conn->query("select doctorName from doctors where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
  echo $row['doctorName'];
}
                  ?></h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Doctor</li>
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
                          <h5 class="panel-title">Add Doctor</h5>
                        </div>
                        <div class="panel-body">
                  
                         <?php $sql=$conn->query("select * from doctors where docEmail='".$_SESSION['login']."'");
while($data=mysqli_fetch_array($sql))
{
?>
                          <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                            <div class="form-group">
                              <label for="DoctorSpecialization">
                                Doctor Specialization
                              </label>
              <select name="Doctorspecialization" class="form-control" required="required">
          <option value="<?php echo htmlentities($data['specilization']);?>">
          <?php echo htmlentities($data['specilization']);?></option>
<?php $ret=$conn->query("select * from doctorspecilization");
while($row=mysqli_fetch_array($ret))
{
?>
                                <option value="<?php echo htmlentities($row['specilization']);?>">
                                  <?php echo htmlentities($row['specilization']);?>
                                </option>
                                <?php } ?>
                                
                              </select>
                            </div>

<div class="form-group">
                              <label for="doctorname">
                                 Doctor Name
                              </label>
  <input type="text" name="docname" class="form-control" value="<?php echo htmlentities($data['doctorName']);?>" >
                            </div>


<div class="form-group">
                              <label for="address">
                                 Ward address
                              </label>
          <textarea name="clinicaddress" class="form-control"><?php echo htmlentities($data['address']);?></textarea>
                            </div>
<div class="form-group">
                              <label for="fess">
                                 Doctor Consultancy Fees
                              </label>
    <input type="text" name="docfees" class="form-control" required="required"  value="<?php echo htmlentities($data['docFees']);?>" >
                            </div>
  
<div class="form-group">
                  <label for="fess">
                                 Doctor Contact no
                              </label>
          <input type="text" name="doccontact" class="form-control" required="required"  value="<?php echo htmlentities($data['contactno']);?>">
                            </div>

<div class="form-group">
                  <label for="fess">
                                 Doctor Email
                              </label>
          <input type="email" name="docemail" class="form-control"  readonly="readonly"  value="<?php echo htmlentities($data['docEmail']);?>">
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



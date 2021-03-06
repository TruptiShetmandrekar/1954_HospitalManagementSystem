<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_GET['submit']))
{
$sql=$conn->query("insert into doctorSpecilization(specilization) values('".$_GET['doctorspecilization']."')");
$_SESSION['msg']="Doctor Specialization added successfully !!";
}

if(isset($_GET['del']))
      {
              $conn->query("delete from doctorSpecilization where id = '".$_GET['id']."'");
                  $_SESSION['msg']="data deleted !!";
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

</head>
<body>
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
    <div class="container-fluid mt--6">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Add specilization </h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">
              <form>
                 <div class="card-body px-lg-5 py-lg-5">
             
                <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
                <?php echo htmlentities($_SESSION['msg']="");?></p> 
                <form role="form" name="dcotorspcl" method="post" >
                <div class="form-group">
                  <label >Doctor Specialization</label>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Enter Doctor Specialization" name="doctorspecilization" type="text">
                  </div>
                </div>
               
                  <button type="submit" class="btn btn-primary mt-4" name="submit" >Submit</button>
                          </form>
                       
                        </div>
                <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Specialization</th>
                    <th scope="col">Creation date</th>
                    <th scope="col">updated Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql=$conn->query("select * from doctorSpecilization");
                  $cnt=1;
                  while($row=mysqli_fetch_array($sql))
                  {
                  ?>
                  <tr>
                    <td scope="col"><?php echo $cnt;?>.</td>
                        <td class="hidden-xs"><?php echo $row['specilization'];?></td>
                        <td><?php echo $row['creationDate'];?></td>
                        <td><?php echo $row['updationDate'];?>
                        </td>
                        <td class="text-right">
                          <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="edit_doctor_specialization.php?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit">Edit Specialisation</a>

                          <a class="dropdown-item" href="add_specilization.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-transparent btn-xs">Delete</a>
                       </div>
                    </td>
                      </tr>
                      
                      <?php 
                        $cnt=$cnt+1;
                       }?>
                </tbody>
              </table>
            </div>
              </form>
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



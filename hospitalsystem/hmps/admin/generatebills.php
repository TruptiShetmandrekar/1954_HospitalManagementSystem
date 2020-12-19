<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_GET['cancel']))
      {
              $conn->query("update appointment set userStatus='0' where id = '".$_GET['id']."'");
                  $_SESSION['msg']="appointment canceled !!";
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
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Appointments</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
                <?php echo htmlentities($_SESSION['msg']="");?></p>
            <div class="table-responsive">
              <!-- Projects table -->
               
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                   <th scope="col">#</th>
                        <th class="hidden-xs">Doctor Name</th>
                        <th>Specialization</th>
                        <th class="hidden-xs">Patient Name</th>
                        <th>Consultancy Fee</th>
                        <th>Appointment Date / Time </th>
                        <th>Appointment Creation Date  </th>
                        <th>Current Status</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
<?php
$sql=$conn->query("select doctors.doctorName as docname,patient.fullName as pname,appointment.* ,
  Patient.fullName as ppname,patient.fullName as pppname,appointment.*  from appointment join doctors on doctors.id=appointment.doctorId join patient on patient.id=appointment.userId ");


$cnt=1;
while($row=mysqli_fetch_array($sql))
  
{
?>




                      <tr>
                        <td scope="col"><?php echo $cnt;?>.</td>
                        <td class="hidden-xs"><?php echo $row['docname'];?></td>
                        <td><?php echo $row['doctorSpecialization'];?></td>
                         <td class="hidden-xs"><?php echo $row['ppname'];?></td>
                        <td><?php echo $row['consultancyFees'];?></td>
                        <td><?php echo $row['appointmentDate'];?> / <?php echo
                         $row['appointmentTime'];?>
                        </td>
                        <td><?php echo $row['postingDate'];?></td>
                        <td>
<?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
{
  echo "Active";
}
if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
{
  echo "Cancel by you";
}

if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
{
  echo "Cancel by Doctor";
}



                        ?></td>
                        <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="edit_bills.php?id=<?php echo $row['id'];?>">Edit bill</a>

                          <a class="dropdown-item" href="manage_doctors.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                         

                        </div>
                      </div>
                    </td>
                      </tr>
                      
                      <?php 
                        $cnt=$cnt+1;
                       }?>
                </tbody>
              </table>
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



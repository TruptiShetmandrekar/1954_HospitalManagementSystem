
<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();


if(isset($_POST['doctor']))
{
  $_SESSION['doctor']=$_POST['doctor'];
}

if(isset($_POST['Doctorspecialization']))
{
  $_SESSION['Doctorspecialization']=$_POST['Doctorspecialization'];
}

if(isset($_POST['pname']))
{
  $_SESSION['pname']=$_POST['pname'];
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
function getdoctor(val) {
  $.ajax({
  type: "POST",
  url: "get_doctors.php",
  data:'specilizationid='+val,
  success: function(data){
    $("#doctor").html(data);
  }
  });
}
</script> 


<script>
function getfee(val) {
  $.ajax({
  type: "POST",
  url: "get_doctors.php",
  data:'doctor='+val,
  success: function(data){
    $("#fees").html(data);
  }
  });
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
              <h6 class="h2 text-white d-inline-block mb-0"><?php $query=$conn->query("select fullName from patient where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
  echo $row['fullName'];
}
                  ?></h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">User</li>
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
                          <h4 class="card-title">Feedback form</h4>
              <form method="post" action="feedback_step_3.php" >
               <div class="tr">
    <div class="td">
          <label>Doctor id : </label>
        </div>
        <div class="td">
      <input type="text" disabled size="5" value="<?php echo $_SESSION['doctor'];?>" />
            <input type="hidden" value="<?php echo $_SESSION['doctor'];?>" name="doctor" />
        </div>
    </div>
     <div class="tr">
     <div class="td">
          <label>Specialization : </label>
        </div>
        

     <div class="td">
      <input type="text" disabled size="25" value="<?php echo $_SESSION['Doctorspecialization'];?>" />
            <input type="hidden" value="<?php echo $_SESSION['Doctorspecialization'];?>" name="Doctorspecialization" />
        </div>
      </div>
      
      
      <div class="tr">
     <div class="td">
          <label>Patient Name : </label>
        </div>
        

     <div class="td">
      <input type="text" disabled size="25" value="<?php echo $_SESSION['pname'];?>"/>
            <input type="hidden" value="<?php echo $_SESSION['pname'];?>" name="pname" />
        </div>
      </div>

      <hr style="width:100%;">
<div class="tddd">
  <span class="text">1. how good was the profssional with making you feel at as  &amp; assessing your medical condition : <br>
    <input type="radio" required value="1" name="q1" />Poor&nbsp;&nbsp;
        <input type="radio" required value="2" name="q1" />Fair&nbsp;&nbsp;
        <input type="radio" required value="3" name="q1" />Good&nbsp;&nbsp;
        <input type="radio" required value="4" name="q1" />Very Good&nbsp;&nbsp;
        <input type="radio" required value="5" name="q1" />Excellent&nbsp;&nbsp;
       </span>
      </div>
      <hr style="width:100%;"> 
      <div class="tddd">
  <span class="text">2. Did you get clears answer  &amp; information : <br>
    <input type="radio" required value="1" name="q2" />Poor&nbsp;&nbsp;
        <input type="radio" required value="2" name="q2" />Fair&nbsp;&nbsp;
        <input type="radio" required value="3" name="q2" />Good&nbsp;&nbsp;
        <input type="radio" required value="4" name="q2" />Very Good&nbsp;&nbsp;
        <input type="radio" required value="5" name="q2" />Excellent&nbsp;&nbsp;
       </span>
      </div>
       <hr style="width:100%;">
       
       
       <div class="tddd">
  <span class="text">3.How was your experience with the professional: <br>
    <input type="radio" required value="1" name="q3" />Poor&nbsp;&nbsp;
        <input type="radio" required value="2" name="q3" />Fair&nbsp;&nbsp;
        <input type="radio" required value="3" name="q3" />Good&nbsp;&nbsp;
        <input type="radio" required value="4" name="q3" />Very Good&nbsp;&nbsp;
        <input type="radio" required value="5" name="q3" />Excellent&nbsp;&nbsp;
       </span>
      </div>
       <hr style="width:100%;">
       
       
       <div class="tddd">
  <span class="text">4. how would you rate this professional bebside manner  : <br>
    <input type="radio" required value="1" name="q4" />Poor&nbsp;&nbsp;
        <input type="radio" required value="2" name="q4" />Fair&nbsp;&nbsp;
        <input type="radio" required value="3" name="q4" />Good&nbsp;&nbsp;
        <input type="radio" required value="4" name="q4" />Very Good&nbsp;&nbsp;
        <input type="radio" required value="5" name="q4" />Excellent&nbsp;&nbsp;
       </span>
      </div>
       <hr style="width:100%;">
       
       
       <div class="tddd">
  <span class="text">5. would you recommend this professional : <br>
    <input type="radio" required value="1" name="q5" />Never&nbsp;&nbsp;
        <input type="radio" required value="2" name="q5" />Probably not&nbsp;&nbsp;
        <input type="radio" required value="3" name="q5" />Maybe&nbsp;&nbsp;
        <input type="radio" required value="4" name="q5" />Probably &nbsp;&nbsp;
        <input type="radio" required value="5" name="q5" />Highly recommended&nbsp;&nbsp;
       </span>
      </div>
       <hr style="width:100%;">
       
       
         
   

                <div class="form-group m-0">
                  <button  name="submit"  id="submit" type="submit" value="NEXT" class="btn btn-primary btn-block" value="SUBMIT" onClick="return confirm('Are you sure?')" >
                    submit
                  </button>
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
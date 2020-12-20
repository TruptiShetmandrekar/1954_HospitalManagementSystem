<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(!empty($_POST))
{
	$pname=$_POST['pname'];
	$dname=$_POST['doctor'];
	$specialisation=$_POST['Doctorspecialization'];
	$q1=$_POST['q1'];
	$q2=$_POST['q2'];
	$q3=$_POST['q3'];
	$q4=$_POST['q4'];
	$q5=$_POST['q5'];

	$total = $q1 + $q2 + $q3 + $q4 + $q5;
	$per=($total/25)*100;
	$x=$conn->query("insert into feedback(doctorName,patientname,specilization,q1,q2,q3,q4,q5,total,percent) values('$dname','$pname','$specialisation','$q1','$q2','$q3','$q4','$q5','$total','$per')");
	if($x==true)
	{
		?>
        
         <script type="text/javascript">
	alert('Feedback successfully submitted');
	window.location='feedback.php';
	</script>
    
    <?php
}}
	?>
		
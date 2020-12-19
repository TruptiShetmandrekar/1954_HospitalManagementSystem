<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="GET">

		speciilisation<input type="" name="speciilisation" value=""/><br><br>

		<input type="submit" name="submit" value="submit"/>
		





	</form>

	<?php 
	include('include/config.php');

	$s=$_GET['speciilisation'];
	

	

	$query="insert into doctorSpecilization(specilization) values('$s')";
	
	mysqli_query($conn,$query);



	 ?>

</body>
</html>
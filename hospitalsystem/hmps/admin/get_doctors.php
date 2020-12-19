<?php
include('include/config.php');
if(!empty($_POST["specilizationid"])) 
{

 $sql=$conn->query("select doctorName,id from doctors where specilization='".$_POST['specilizationid']."'");?>
 <option selected="selected">Select Doctor </option>
 <?php
 while($row=mysqli_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['doctorName']); ?></option>
  <?php
}
}


if(!empty($_POST["doctor"])) 
{

 $sql=mysqli_query("select doctorName from doctors where doctorName='".$_POST['doctorid']."'");
 while($row=mysqli_fetch_array($sql))
 	{?>
 <option value="<?php echo htmlentities($row['doctorName']); ?>"><?php echo htmlentities($row['doctorName']); ?></option>
  <?php
}
}


?>
et
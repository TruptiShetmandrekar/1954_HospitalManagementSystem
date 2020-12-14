<?php
session_start();
include('include/config.php');


session_unset();
//session_destroy();
$_SESSION['errmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="./index.php";
</script>

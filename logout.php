<?php
session_start();
$_SESSION['login']=="";
$_SESSION["status"] =="";
session_unset();
$_SESSION['action1']="You have logged out successfully..!";
?>
<script language="javascript">
document.location="index.php";
</script>



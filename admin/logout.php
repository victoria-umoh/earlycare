<?php
error_reporting(E_ALL);

session_start();



session_destroy();


header("location:../admin/login.php");
exit();

?>



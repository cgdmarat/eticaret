<?php
include("connection.php");
session_start();
  $mail =$_POST['mail'];
  $sifre =$_POST['sifre'];
  //$sifre = md5($sifre);
  $sorgu = "SELECT * FROM kullanicilar WHERE mail='$mail' AND sifre='$sifre'";
  	$sonuclar = mysqli_query($conn, $sorgu);
  	if (mysqli_num_rows($sonuclar)==1) {
	  $sutun = mysqli_fetch_array($sonuclar,MYSQLI_NUM);
  	  $_SESSION['username'] = $sutun[3];
	  $_SESSION['id'] = $sutun[0];
		echo "1";
  	}else {
  		echo "0";
  	}
mysqli_close($conn);
?>
<?php
include("connection.php");
session_start();
  $id=$_POST['id'];
  $ad =$_POST['ad'];
  $soyad =$_POST['soyad'];
  $nick =$_POST['nick'];
  $mail =$_POST['mail'];
  $sorgu = "UPDATE kullanicilar SET ad='$ad', soyad='$soyad', nick='$nick' , mail=' $mail' WHERE id='$id'";
  $sonuclar = mysqli_query($conn, $sorgu);
  	if ($sonuclar) {
  	  $_SESSION['username'] = $nick;
		echo "1";
  	}else {
  		echo "0";
  	}
mysqli_close($conn);
?>
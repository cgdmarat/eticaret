<?php
	include("connection.php");
    session_start();
    $ad=$_POST["ad"];
    $soyad= $_POST["soyad"];
    $nick= $_POST["nick"];
    $mail=$_POST["mail"];
    $sifre= $_POST["sifre"];
    $kullanicikontrol = "SELECT * FROM kullanicilar WHERE nick='$nick' OR mail='$mail' LIMIT 1";
    $sonuc=mysqli_query($conn,$kullanicikontrol);

    if(mysqli_num_rows($sonuc)>0)
    {    
       echo "-1";
    }
    else
    {
      $sql="INSERT INTO kullanicilar(ad,soyad,nick,mail,sifre) VALUES ('$ad','$soyad','$nick','$mail','$sifre')";
      $basari=mysqli_query($conn, $sql);
      if($basari)
      {
      $kullanicikontrol = "SELECT * FROM kullanicilar WHERE nick='$nick' OR mail='$mail' LIMIT 1";
      $sonuc=mysqli_query($conn,$kullanicikontrol);
      $satir = mysqli_fetch_array($sonuc,MYSQLI_NUM);
      $_SESSION['username'] = $nick;
      $_SESSION['id'] = $satir[0];
      echo "1";
      }
      else echo "0";
    }
		mysqli_close($conn);
		?>
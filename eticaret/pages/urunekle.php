		<?php
	include("connection.php");
    $ad=$_POST["ad"];
    $aciklama= $_POST["aciklama"];
    $fiyat= $_POST["fiyat"];
    $adet=$_POST["adet"];
    $resim= $_POST["resim"];
    $sayfakonum=isset($_POST["sayfakonum"])?1:0;
    $sayfakonum1=isset($_POST["sayfakonum1"])?1:0;
    $sayfakonum2=isset($_POST["sayfakonum2"])?1:0;
	/*$fileinfo=PATHINFO($_FILES["resim"]["name"]);
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["resim"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;*/
    $sql="INSERT INTO urunler(ad,aciklama,fiyat,adet,resimkonum,sayfakonum,sayfakonum1,sayfakonum2) 
	VALUES ('$ad','$aciklama','$fiyat','$adet','$resim','$sayfakonum','$sayfakonum1','$sayfakonum2')";
	$basari=mysqli_query($conn, $sql);
	if(isset($basari)) echo "1"; else echo "0";
		mysqli_close($conn);
		?>
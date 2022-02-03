<?php 
  session_start(); 
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
    unset($_SESSION['id']);
  }
?>
<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Website</title>

    <link href="../content/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="../content/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../content/js/bootstrap.min.js"></script>   
  </head>
  <body>
    <header>
      <!--Menü Çubuğu-->
      <div class="container">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="padding: 10px;" href="../pages/index.php"><img src="../content/resimler/logo.png" width="50"></a>
          </div>
      
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              
            <form class="navbar-form navbar-left">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Arama">
              </div>
              <button type="submit" class="btn btn-primary"><i class="icon-search"></i>Ara</button>
            </form>
            <div class="nav navbar-nav navbar-right">
              <br>
              <a href="../pages/register.html" class="btn btn-primary"><i class="icon-user"></i>Üye Ol</a>
              <a href="../pages/login.html" class="btn btn-success"><i class="icon-signin"></i>Giriş</a>
              <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Hoşgeldin <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">çıkış</a> </p>
    <?php endif ?>
              
            </div>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../pages/adminpaneli.php" style="color:white">Admin Paneli</a></li>
              <li><a href="../pages/order.php" style="color:white">Siparişlerim</a></li>
        <?php if(isset($_SESSION['username'])){echo'<li><a href="../pages/profil.php?id='.$_SESSION['id'].'" style="color:white">Profilim</a></li>';}?>
              
                
               
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </div>
    </header>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <!--Slider-->
        <div id="carousel-example-generic" class="carousel inner" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>
        
          <!-- Wrapper for slides -->
<div class='carousel-inner' role='listbox'>;
<?php
include("connection.php");
$result=mysqli_query($conn,"select * from urunler WHERE sayfakonum1='1' LIMIT 3");
if(mysqli_num_rows($result)>0)
{
  $j=0;
while($data = mysqli_fetch_row($result))
  {  
        $resimkonum=substr($data[5],10);
        if($j<1) {echo '<div class="item active">';} else {echo '<div class="item">';};
        echo  "<img src='../content/resimler/$resimkonum' style='width:25%';>";
        echo  '<div class="carousel-caption">';
        echo   "<h3><strong></strong><h3></h3></div></div>";
      $j++;
  }
}
  mysqli_close($conn);
  ?>
  </div>
        
          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        </div>
      </div>
      <br />
      <div class="row">
        <div class="col-md-3">
          <!--kategori Listesi-->

          <div class="list-group">
            <a href="../pages/product.html" class="list-group-item active">
              TÜM KATEGORİLER
            </a>
            <a href="../pages/product.html" class="list-group-item"><i class="icon-chevron-right"></i>Kategori 1<span class="badge">12</span></a>
            <a href="../pages/product.html" class="list-group-item"><i class="icon-chevron-right"></i>Kategori 2<span class="badge">10</span></a>
            <a href="../pages/product.html" class="list-group-item"><i class="icon-chevron-right"></i>Kategori 3<span class="badge">14</span></a>
            
            
            <br/>
            <a href="../pages/summary.php" class="list-group-item">Sepetiniz[1]<span class="badge">20</span></a>
         </div>
         <div class="row">
          <div class="col-sm-6 col-md-12">
            <h3>Popüler Ürünler</h3>
            <?php
include("connection.php");
$result=mysqli_query($conn,"select * from urunler WHERE sayfakonum2='1'");
if(mysqli_num_rows($result)>0)
{
while($data = mysqli_fetch_row($result))
  {  
    $resimkonum=substr($data[5],10);
        echo   '<div class="thumbnail">';
        echo   "<img src='../content/resimler/$resimkonum'>";
        echo    '<div class="caption">';
        echo    "<h3>$data[1]</h3>";
        echo    "<p>$data[2]</p>";
        echo    '<p> <a href="../pages/productdetails.php?id='.$data[0].'&ad='.$data[1].'&fiyat='.$data[3].'&adet='.$data[4].'&aciklama='.$data[2].'&resimkonum='.$data[5].'" class="btn btn-default" role="button"><i class="icon-eye-open"></i></a>';
        echo    "<a href=summary.php?id=$data[0]&ekle=true class='btn btn-primary' role='button'><i class='icon-shopping-cart'></i>Sepete Ekle</a>";
        echo    "<button class='btn btn-success'>$data[3]TL</button>";
        echo    "</p></div></div>";
  }
}
mysqli_close($conn);
  ?>
          </div>
        </div>

        </div>
        <div class="col-md-9">
          <!--ürün Listesi-->
          <div class="row">

<?php
include("connection.php");
$result=mysqli_query($conn,"select * from urunler WHERE sayfakonum='1'");
if(mysqli_num_rows($result)>0)
{
while($data = mysqli_fetch_row($result))
  {  
$resimkonum=substr($data[5],10);
echo "<div class='col-sm-6 col-md-4'>";     
echo '<div class="thumbnail">';
echo "<img src='../content/resimler/$resimkonum'>";
echo "<div class='caption'>";
echo "<h3>$data[1]</h3>";
echo "<p>$data[2]</p>";
echo '<p> <a href="../pages/productdetails.php?id='.$data[0].'&ad='.$data[1].'&fiyat='.$data[3].'&adet='.$data[4].'&aciklama='.$data[2].'&resimkonum='.$data[5].'" class="btn btn-default" role="button"><i class="icon-eye-open"></i></a>';
echo "<a href=summary.php?id=$data[0]&ekle=true class='btn btn-primary' role='button'><i class='icon-shopping-cart'></i>Sepete Ekle</a>";
echo  "<button class='btn btn-success'>$data[3]TL</button>";
echo "</p></div></div></div>";
  }
}
mysqli_close($conn);
?>
   
          </div>

        </div>
          


      </div>
    </div>
  
    <footer>
      <!--Footer-->
      <div class="container">
        <div class="row well" style="background-color: black;">
          <div class="col-md-9">
            <h5 class="text-uppercase" style="color:white">İLETİŞİM</h5>
            <ul class="list-unstyled">
            <li><a href="#" style="color:white">Adres</a></li>
            <li><a href="#" style="color:white">Telefon</a></li>
            <li><a href="#" style="color:white">Üye Ol</a></li>
            <li><a href="#" style="color:white">Giriş</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h5 class="text-uppercase" style="color:white">SOSYAL MEDYA</h5>
            <ul class="list-unstyled">
            <li><a href="#"><img src="../content/resimler/ff.jpg"width="50"></a>
              <a href="#"><img src="../content/resimler/twitter.jpg"width="50"></a>
              <a href="#"><img src="../content/resimler/ins.png"width="50"></a>
            </li>
            
            </ul>
            </div>

        </div>
      </div>
    </footer>

    
  </body>
</html>
<?php 
  session_start(); 
  if ($_SESSION['username']=="") {
  	header('location: login.html');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.html");
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
    <script>
      $(document).ready(function(){
          $("#guncellebtn").click(function(){
             var id=$("#id").val();
              var ad=$("#ad").val();
              var soyad=$("#soyad").val();
              var nick=$("#nick").val();
              var mail=$("#mail").val();
              if(ad==''||soyad==''||nick==''||mail=='') {
                    alert("Alanları boş bırakmayınız.");
                    return false;
                }
              $.ajax({
                  url:'profilguncelle.php',
                  method:'POST',
                  data:{
                      id:id,
                      ad:ad,
                      soyad:soyad,
                      nick:nick,
                      mail:mail,
                  },
                 success:function(veri){
                   if(veri==1)  alert("Güncelleme başarılı");
                   else alert("Güncelleme başarısız");
                 },
                 error: function(e){
                 alert(e.error);
                      }
              });
          });
      });
  </script>
    
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
        <!--Slider-->
      </div>
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
            <div class="thumbnail">
              <img src="../content/resimler/format_webp (4).jpg"  alt="...">
              <div class="caption">
                <h3>Ürün Adı</h3>
                <p>Açıklama</p>
                <p>
                  <a href="../pages/productdetails.php" class="btn btn-default" role="button"><i class="icon-eye-open"></i></a>
                  <a href="../pages/summary.php" class="btn btn-primary" role="button"><i class="icon-shopping-cart"></i>Sepete Ekle</a> 
                  <button class="btn btn-success">2500 tl</button>
                  </p>
              </div>
            </div>
          </div>
          <div class="thumbnail">
            <img src="../content/resimler/format_webp (2).jpg"  alt="...">
            <div class="caption">
              <h3>Ürün Adı</h3>
              <p>Açıklama</p>
              <p>
                <a href="../pages/productdetails.php" class="btn btn-default" role="button"><i class="icon-eye-open"></i></a>
                <a href="../pages/summary.php" class="btn btn-primary" role="button"><i class="icon-shopping-cart"></i>Sepete Ekle</a> 
                <button class="btn btn-success">2800 tl</button>
                </p>
            </div>
          </div>
        </div>

        </div>
        <div class="col-md-9">
          <!--Değişecek alan-->
          <ol class="breadcrumb">
            <li><a href="../pages/index.php"><i class="icon-home"></i>Anasayfa</a></li>

            <li class="active">Profil Güncelleme</li>
            <?php
include("connection.php");
$id=$_GET['id'];
$result=mysqli_query($conn,"select * from kullanicilar WHERE id='$id' LIMIT 1");
if(mysqli_num_rows($result)==1)
{
  $satir=mysqli_fetch_row($result);
  echo '
            <form class="form-horizontal">
            <div class="form-group">
            <div class="col-sm-4">
              <input type="hidden" class="form-control" id="id" value="'.$satir[0].'" >
            </div>
          </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Adı</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="ad" value="'.$satir[1].'" >
                  </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Soyad</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="soyad" value="'.$satir[2].'">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Kullanıcı Adı</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="nick" value="'.$satir[3].'">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-4">
                      <input type="email" class="form-control" id="mail" value="'.$satir[4].'">
                    </div>
                    </div>
                <div class="form-group">
                  <div class="col-sm-10 col-sm-offset-2">
                      <br>
                    <button type="button" id="guncellebtn" class="btn btn-success"><i class="icon-edit"></i> Güncelle </button>
                     <a href="../pages/changepassword.html"></i>Şifre Değiştir</a>
                  </div>
                </div>
              </form>';
}?>
          </ol>
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
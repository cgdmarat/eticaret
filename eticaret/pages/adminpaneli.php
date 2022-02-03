<?php 
  session_start(); 
  if ($_SESSION['username']!="admin123321") {
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
          $("#ekle").click(function(){
              var ad=$("#ad").val();
              var aciklama=$("#aciklama").val();
              var fiyat=$("#fiyat").val();
              var adet=$("#adet").val();
              var resim=$("#resim").val();
              var sayfakonum=$("#sayfakonum").val();
              var sayfakonum1=$("#sayfakonum1").val();
              var sayfakonum2=$("#sayfakonum2").val();
              if(ad==''||aciklama==''||fiyat==''||adet=='') {
                    alert("Alanları boş bırakmayınız.");
                    return false;
                }
              $.ajax({
                  url:'urunekle.php',
                  method:'POST',
                  data:{
                      ad:ad,
                      aciklama:aciklama,
                      fiyat:fiyat,
                      adet:adet,
                      resim:resim,
                      sayfakonum:sayfakonum,
                      sayfakonum1:sayfakonum1,
                      sayfakonum2:sayfakonum2
                  },
                 success:function(veri){
                   if(veri==1)  alert("Yükleme başarılı");
                   else alert("yükleme başarısız");
                 },
                 error: function(e){
                 alert(e.error);
                      }
              });
          });
          $('#sil').click(function(){
              alert("sil");
          });
          $('#guncelle').click(function(){
            alert("güncelle");
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

            <li class="active">Admin Paneli</li>
            <form class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" >Ürün Adı</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Ürün Adı" name="ad" id="ad">
                  </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Açıklama</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" placeholder="Açıklama" name="aciklama" id="aciklama">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label" >Fiyat</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control"  placeholder="Fiyat" name="fiyat" id="fiyat">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Adet</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control"  placeholder="Adet" name="adet" id="adet">
                    </div>
                  </div>

                    <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Resim</label>
                    <div class="col-sm-4">
                      <input type="file" class="form-control"  placeholder="Resim" name="resim" id="resim">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Anasayfa</label>
                   <div class="checkbox">
                       <label><input type="checkbox" value="0" name="0" id="sayfakonum"></label>
                   </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Slider</label>
                   <div class="checkbox">
                       <label><input type="checkbox" value="1" name="1" id="sayfakonum1"></label>
                   </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Popüler Ürün</label>
                   <div class="checkbox">
                       <label><input type="checkbox" value="2" name="2" id="sayfakonum2"></label>
                   </div>
                  </div>

                
                <div class="form-group">
                  <div class="col-sm-10 col-sm-offset-2">
                    <button type="button" class="btn btn-success"  value="ekle" id="ekle"><i class="icon-edit"></i>Ekle</button>

                <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                          <button type="button" class="btn btn-success"  value="sil" id="sil"><i class="icon-edit"></i>Sil</button>

                <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                              <button type="button" class="btn btn-success"  value="guncelle" id="guncelle"><i class="icon-edit"></i>Güncelle</button>  
                     
                  </div>
                </div>
              </form>
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
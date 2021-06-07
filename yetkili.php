<?php
$sunucu_adi="localhost";
$kullanici_adi="root";
$sifre="";
$vt="siparismarkaled";
$baglanti=new mysqli($sunucu_adi,$kullanici_adi,$sifre,$vt);
mysqli_set_charset($baglanti,"utf8");
if($baglanti->connect_error)
  die("bağlantı sağlanamadı:".$baglanti->connect_error);
//ob_start();
//session_start();
/*if(isset($_POST["giris_yap"]))  
      {header("Location:201613709004.php");
        die();}*/

session_start();

  if(isset($_POST["giris_yap"]))
      {   
      $_SESSION["kullanici_no"] = $_POST["kullanici_no"];
        $sorgu="SELECT * FROM yetkili where kullanici_no='".@$_POST["kullanici_no"]."'";
        $sonuc=$baglanti->query($sorgu);
        $kayit=$sonuc->fetch_assoc();


        if($kayit["kullanici_no"]==@$_POST["kullanici_no"] && $kayit["sifre"]==@$_POST["sifre"])
        {

          $_SESSION["giris_yap"]=true;        
    
          header('Location:yonlendir/uretim.php');          
        }

        else
        {          
          echo "Yönetici Kaydınız Bulunmamaktadır.";
        }        
      }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Yetkili Giriş</title>
    <!-- Bootstrap core CSS -->
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
  </head>


  <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="yonlendir/image/logo.png" alt="" width="300" height="90">
        <h2>Yetkili Giriş</h2>

      </div>
      <div class="row">        
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Yetkili Giriş Sayfası</h4>

          <form class="needs-validation" action="" method="post">   


            <div class="mb-3">   
              <div class="input-group">                
                <input type="text" class="form-control" id="epostaTxt" placeholder="Yetkili Numaranızı Giriniz" name="kullanici_no" required="">        

              </div>
              <br>
              <div class="input-group">                
                <input type="password" class="form-control" id="epostaTxt" placeholder="Şifreniz" name="sifre" required="">       
              </div>
            </div>
             <button class="btn btn-outline-info btn-lg btn-block" name="giris_yap" type="submit" ><i>Giriş Yap</i></button>
          </form>

      <br>
          <input type="button" value="Yeni Kullanıcı Ekle" class="btn btn-outline-warning btn-lg btn-block" id="btnHome" 
                 onClick="document.location.href='kullanici_kayit2.php'" />
        </div>
      </div>
      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; Markaled</p>
        <ul class="list-inline">
        </ul>
      </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>





















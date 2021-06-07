
<?php

$sunucu_adi="localhost";
$kullanici_adi="root";
$sifre="";
$vt="siparismarkaled";

$baglanti=new mysqli($sunucu_adi,$kullanici_adi,$sifre,$vt);

mysqli_set_charset($baglanti,"utf8");
if($baglanti->connect_error)
	die("bağlantı sağlanamadı:".$baglanti->connect_error);
session_start();

if($_SESSION["siparis_no"]==""||$_SESSION["sifre"]=="")
{
    header("Location:../kullanici_giris.php");    
}
?>
<!doctype html>
<html lang="en">
  <head>  

    <title>Markaled-Pazarlama</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
    	
    	.h1
    	{
    		font-family: Verdana, Geneva, Tahoma, sans-serif;
    		font-size: :45pt;
    		color: gray;
    		background-color: transparent; 
    	}

/*    	.design
    	{
    		font-family: sans-serif;
    		font-size: :10pt;
    		color: gray;
    		background-color: transparent;
    	}*/

    	.inputDesign {
       
        text-align: center;
        vertical-align: middle;
    }

            .container
        {
/*            margin-left: 0;
            margin-right: 0;*/
            max-width: 100%;
        }

        .table {
            max-width: 100%;
        }
    </style>
  </head>

  <body class="bg-light">  
   
    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="image/uretim.jpg" alt="" width="300" height="90">
        <h2 class="h4"><i>PAZARLAMA</i></h2>
		</div>
		<div class="row">
		<div class="col-md-12 order-md-2">
		

        </div>
      </div>
       
        <form method="POST" action="">
			<div class="container">
			<div class="py-5 text-center">				
			</div>
			
		
			<div class="row">
				<table class="table table-bordered table-dark">
					<thead>
					<tr>
						
						<th><i>Sipariş No</i></th>
						<th><i>Sipariş Tarihi</i></th>
						<th><i>Müşteri Ad Soyad</i></th>
						<th><i>Ürün Adet</i></th>
						<th><i>Muhtemel Üretim Tarihi</i></th>
						<th><i>Üretim Tarihi</i></th>
						<th><i>Teslim-Montaj-İhracat Tarihi</i></th>
						<th><i>Teslim Şekli</i></th>
						<th><i>Özel Not</i></th>
						<th><i>İşlemin Yapıldığı Tarih</i></th>
						<th><i>Son Güncelleme</i></th>


						
					</tr>
					</thead>
					<tbody>
					
					<?php
						/*$sorgu_listele="SELECT * FROM siparis WHERE kullanici_bilgileri_table_id='3'";*/


						$sorgu_listele="SELECT 
						    aa_siparis_no,
						    aa_siparis_tarihi,
						    aa_musteri,
						    aa_urun_adet,
						    aa_muhtemel_uretim_tarih,
						    aa_uretilen_tarih,
						    aa_teslim_montaj_ihracat_tarih,
						    aa_teslim_sekli,
						    aa_ozel_not,
						    aa_islem_tarihi,
						    updated_at 
						        FROM siparis
						        WHERE id2
						        IN
						            ( SELECT
						                 id2 
						                FROM kullanici_bilgileri where id2='3')";//2,1..yazınca oluyor

						/*$sorgu_listele="SELECT * FROM siparis,kullanici_bilgileri WHERE siparis.kullanici_bilgileri_table_id=kullanici_bilgileri.id";*/

						$sonuc=$baglanti->query($sorgu_listele);
						while($kayit=$sonuc->fetch_assoc())
						{
					?>
					<tr>
						
						<td><?=$kayit["aa_siparis_no"]?></td>
						<td><?=$kayit["aa_siparis_tarihi"]?></td>
						<td><?=$kayit["aa_musteri"]?></td>
						<td><?=$kayit["aa_urun_adet"]?></td>

						<td><?=$kayit["aa_muhtemel_uretim_tarih"]?></td>
						<td><?=$kayit["aa_uretilen_tarih"]?></td>
						<td><?=$kayit["aa_teslim_montaj_ihracat_tarih"]?></td>

						<td><?=$kayit["aa_teslim_sekli"]?></td>
						<td><?=$kayit["aa_ozel_not"]?></td>
						<td><?=$kayit["aa_islem_tarihi"]?></td>

						<td>
                          <?=$kayit["updated_at"]?>
                        </td>


					</tr>
					<?php
						}
					?>
					</tbody>
				</table>		 
			
			</div>
			</div>
			<input type="button" value="Çıkış" class="btn btn-outline-danger btn-lg btn-block" id="btnHome" 
                 onClick="document.location.href='../kullanici_giris.php'" />

		</form>         
                      
                                            
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










































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
   

    <title>Markaled-Devops</title>
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
        <h2 class="h4"><i>Developer</i></h2>
		</div>
		<div class="row">
		<div class="col-md-12 order-md-2">
		
		<?php
			//düzenleme kodları yazılacak güncelleme butonu eklenecek.
			if(isset($_POST["aa_duzenle"]))
			{
				$sorgu_duzenle="SELECT * FROM siparis WHERE id=".$_POST["aa_duzenle"];
				$sonuc=$baglanti->query($sorgu_duzenle);
				$kayit=$sonuc->fetch_assoc();
			
		?>



        <form class="needs-validation " method="POST" action="" >
            <div class="row">
              <div class="col-md-6 mb-3">


                <label  for="firstName" class="design  "><i> Sipariş No</i></label>
                <input 
                type="text" 
                name="siparis_no" 
                class="form-control " 
                id="firstName" 
                placeholder="" 
                value="<?=$kayit["aa_siparis_no"]?>" >

                <label for="firstName" class="design"> <i>Sipariş Tarihi</i></label>
                <input 
                type="date" 
                name="siparis_tarihi" 
                class="form-control" 
                id="secondName" 
                placeholder="" 
                value="<?=$kayit["aa_siparis_tarihi"]?>" >

                <label for="firstName" class="design "><i>Müşteri Ad Soyad</i></label>
                <input 
                type="text" 
                name="musteri_ad_soyad" 
                class="form-control" 
                id="thirdName" 
                placeholder="" 
                value="<?=$kayit["aa_musteri"]?>" >

                <label for="firstName" class="design "><i>Ürün Adet</i></label>
                <input 
                type="text" 
                name="urun_adet" 
                class="form-control" 
                id="fourName" 
                placeholder="" 
                value="<?=$kayit["aa_urun_adet"]?>" >

                <label for="firstName" class="design "><i>Muhtemel Üretim Tarihi</i></label>
                <input 
                type="date" 
                name="muhtemel_uretim_tarihi" 
                class="form-control" 
                id="fiveName" 
                placeholder="" 
                value="<?=$kayit["aa_muhtemel_uretim_tarih"]?>" >


                <label for="firstName" class="design "><i>Üretim Tarihi</i></label>
                <input 
                type="date" 
                name="uretim_tarihi" 
                class="form-control" 
                id="sixName" 
                placeholder="" 
                value="<?=$kayit["aa_uretilen_tarih"]?>" >


                <label for="firstName" class="design "><i>Teslim-Montaj-İhracat Tarihi</i></label>
                <input 
                type="date" 
                name="teslim_montaj_ihracat" 
                class="form-control" 
                id="sevenName" 
                placeholder="" 
                value="<?=$kayit["aa_teslim_montaj_ihracat_tarih"]?>" >

                <label for="firstName" class="design "><i>Teslim Şekli</i></label>
                <input 
                type="text" 
                name="teslim_sekli" 
                class="form-control" 
                id="eightName" 
                placeholder="" 
                value="<?=$kayit["aa_teslim_sekli"]?>" >



                <label for="firstName" class="design "><i>Özel Not</i></label>
                <input 
                type="text" 
                name="ozel_not" 
                class="form-control" 
                id="nineName" 
                placeholder="" 
                value="<?=$kayit["aa_ozel_not"]?>" >

       

        

				<input type="hidden" name="aa_id" class="form-control" id="firstName" placeholder="" value="<?=$kayit["id"]?>" >

              </div>
            
            </div>
			   
             <button class="btn btn-outline-danger btn-lg btn-block" name="aa_guncelle" type="submit" ><i>Bilgileri Güncelle</i></button>
        </form>
		

		<?php
			
			}
			else
			{
		?>	


		<form class="needs-validation" method="POST" action="" >
            <div class="form-row">
              <div class="col-md-4 mb-3">
               
                <input type="text" name="siparis_no" class="form-control" id="firstName" placeholder="Sipariş No" value="" >

                <br>            
                <input type="date" name="siparis_tarihi" class="form-control" id="secondName" placeholder="Sipariş Tarihi" value="" >

                <br>
              


                 <input type="date" name="muhtemel_uretim_tarihi" class="form-control" id="secondName" placeholder="Muhtemel Üretim Tarihi" value="" >
              </div>

              <div class="col-md-4 mb-3">

              
                <input type="text" name="urun_adet" class="form-control" id="thirdName" placeholder="Ürün Adet" value="" >


                <br>   

                <input type="date" name="teslim_montaj_ihracat" class="form-control" id="thirdName" placeholder="Teslim-Montaj-İhracat Tarihi" value="" >         
          

                <br>
                <input type="date" name="uretim_tarihi" class="form-control" id="thirdName" placeholder="Üretim Tarihi" value="" >
               </div>
               
               <div class="col-md-4 mb-3">

               <input type="text" name="musteri_ad_soyad" class="form-control" id="thirdName" placeholder="Müşteri Ad Soyad" value="" >


                <br>            
                <input type="text" name="teslim_sekli" class="form-control" id="secondName" placeholder="Teslim Şekli" value="" >

                <br>
                <input type="text" name="ozel_not" class="form-control" id="thirdName" placeholder="Özel Not" value="" >

              </div>


 




              
            
            </div>	
           

            <button class="btn btn-outline-success btn-lg btn-block" name="aa_urun_kaydet" type="submit" ><i>Kaydet</i></button>

             <input type="button" value="Çıkış" class="btn btn-outline-danger btn-lg btn-block" id="btnHome" 
                 onClick="document.location.href='../kullanici_giris.php'" />

        </form>


    
		  
        </div>
      </div>
	  
	  <?php
			}
	  ?>
	  

	   <?php
			if(isset($_POST["aa_urun_kaydet"]))
			{
				$sorgu_urun_kayıt="INSERT INTO `siparis` (`id`, `aa_siparis_no`,`aa_siparis_tarihi`,`aa_musteri`, `aa_urun_adet`, `aa_muhtemel_uretim_tarih`, `aa_uretilen_tarih`, `aa_teslim_montaj_ihracat_tarih`, `aa_teslim_sekli`, `aa_ozel_not`)

				 VALUES (NULL, '".$_POST["siparis_no"]."','".$_POST["siparis_tarihi"]."','".$_POST["musteri_ad_soyad"]."', '".$_POST["urun_adet"]."','".$_POST["muhtemel_uretim_tarihi"]."','".$_POST["uretim_tarihi"]."','".$_POST["teslim_montaj_ihracat"]."','".$_POST["teslim_sekli"]."','".$_POST["ozel_not"]."');";

				$baglanti->query($sorgu_urun_kayıt);

			}


			
			if(isset($_POST["aa_guncelle"]))
			{
				$sorgu_guncelle="UPDATE `siparis` 

				SET `aa_siparis_no` = '".$_POST["siparis_no"]."',

				`aa_siparis_tarihi` = '".$_POST["siparis_tarihi"]."',

				`aa_musteri` = '".$_POST["musteri_ad_soyad"]."',

				`aa_urun_adet` = '".$_POST["urun_adet"]."',

				`aa_muhtemel_uretim_tarih` = '".$_POST["muhtemel_uretim_tarihi"]."',	

				`aa_uretilen_tarih` = '".$_POST["uretim_tarihi"]."',

				`aa_teslim_montaj_ihracat_tarih` = '".$_POST["teslim_montaj_ihracat"]."',

				`aa_teslim_sekli` = '".$_POST["teslim_sekli"]."',		

				`aa_ozel_not` = '".$_POST["ozel_not"]."'

							

				 WHERE `siparis`.`id` =".$_POST["aa_id"];

				$baglanti->query($sorgu_guncelle);
				
			}
	   ?>     
      
          
        <form method="POST" action="">
			<div class="container">
			<div class="py-5 text-center">				
			</div>
			
		
			<div class="row">
				<table class="table table-bordered table-dark">
					<thead>
					<tr>
						<th><i>ID</i></th>
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
						$sorgu_listele="SELECT * FROM siparis WHERE id2='4'";
						$sonuc=$baglanti->query($sorgu_listele);
						while($kayit=$sonuc->fetch_assoc())
						{
					?>
					<tr>
						<td><?=$kayit["id"]?></td>
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



						<td>
							<button class="btn btn-outline-warning" name="aa_duzenle" type="submit" value="<?=$kayit["id"]?>"><i>Düzenle</i></button>
							
						</td>
					</tr>
					<?php
						}
					?>
					</tbody>
				</table>		 
			
			</div>
			</div>
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









































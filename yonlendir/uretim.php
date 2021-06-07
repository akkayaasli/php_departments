
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
   

    <title>Markaled-Üretim</title>
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

    	.inputDesign 
        {
       
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
        <h2 class="h4"><i>ÜRETİM</i></h2>
		</div>
		<div class="row">
		<div class="col-md-12 order-md-2">


<!--             <div class="input-group">                
                <select name="filterList" class="browser-default custom-select design" >
                  <option selected>Sipariş Numarasına Göre Filtreleyin..</option>

                  <option value="0" name=opt1>2147483647
                  </option>

                  <option value="1" name=opt2>1</option>

                  <option value="2" name=opt3>2</option>

                  <option value="3" name=opt4>3</option>
                  
                </select>      
            </div> -->



        <form method="get" action="" class="form-inline mt-2 mt-md-0">
            <input type="text" name="kelime" class="form-control mr-sm-2" placeholder="Ara...">
            <br>

            <input type="submit" class="btn btn-outline-success my-2 my-sm-0 btn-block" name="submit" value="Ara">
        </form>


        <?php

            if($_GET)
            {
                $kelime=$_GET['kelime'];

                if(!$kelime){
                    echo "Arama Yapmak İçin Bir Şeyler Yazmalısın.";
                }
                else
                {
                    $sorgu="SELECT*FROM siparis WHERE aa_siparis_no LIKE '%$kelime%' ";

                    $sonuc=$baglanti->query($sorgu);
                    $kayit=$sonuc->rowCount();

                   
                    if($kayit->rowCount())
                    {
                        foreach($sorgu as $row)
                        {
                            echo $kelime."Numarasına ait (".$sorgu->rowCount().") adet sonuç bulundu.";
                            echo "<br><br>";
                            echo "<b>Sonuç:</b>".$row['aa_siparis_no']."<br>";
                        }
                    }else{
                        echo "Aranan kelimeye ait bir veri bulunamadı.";

                    }
                }
            }






           /* if (isset($_POST['submit']))
            {
                $connection = new mysqli("localhost", "root", "", "siparismarkaled");
                $q = $connection->real_escape_string($_POST['q']);
                $row = $connection->real_escape_string($_POST['row']);

                if ($row == "" || ($row != "id"))
                    $row = "id";                   
            

                $sql = $connection->query("SELECT id FROM siparis WHERE $row LIKE '%$q%'");
                if ($sql->num_rows > 0)
                 {
                    while ($data = $sql->fetch_array())
                        echo $data['id'] . "<br>";

                } 
                else
                    echo "Hatalı bir şeyler oluyor..";
            }*/
        ?>



        </div>  



		
<?php
/*if(isset($_POST['opt1'])) {
    $opt1 = "SELECT*FROM siparis WHERE aa_siparis_no = '2147483647'";   
    
} 
else if(isset($_POST['opt2']))
{
    $opt1 = "SELECT*FROM siparis WHERE aa_siparis_no = '2019103400'";   
    
}

else 
{
    echo 'seçim yapılmadı..';
}
*/



?>
		<?php
			//düzenleme kodları yazılacak güncelleme butonu eklenecek.
			if(isset($_POST["aa_duzenle"]))
			{
				$sorgu_duzenle="SELECT * FROM siparis WHERE id=".$_POST["aa_duzenle"];
				$sonuc=$baglanti->query($sorgu_duzenle);
				$kayit=$sonuc->fetch_assoc();
			
		?>



        <form class="needs-validation container " method="POST" action="" >
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
			   
             <button class="btn btn-outline-warning btn-lg btn-block" name="aa_guncelle" type="submit" ><i>Bilgileri Güncelle</i></button>


             <br>

<input type="button" value="Çıkış" class="btn btn-outline-danger btn-lg btn-block" id="btnHome" 
                 onClick="document.location.href='../kullanici_giris.php'" />


     
        </form>
		

		<?php
			
			}
			else
			{
		?>	
		  
        </div>
      </div>
	  
	  <?php
			}
	  ?>	  


	   <?php
			
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
			<div class="py-2 text-center">		
            <!-- buradaki div tag ı tablo ile arama işlemlerinin yapıldığı aradaki uzaklığı ayarlıyor. -->		
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
						$sorgu_listele="SELECT * FROM siparis";
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


        <form class="needs-validation" method="POST" action="" >     


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









































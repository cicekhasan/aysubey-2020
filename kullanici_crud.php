<?php   
	session_start();  
  require 'baglan.php'; 
  require 'inc/fonksiyonlar.php';

  	echo "selam";
	  die('Bitti');

	$id = $_POST['kullanici_id'];
  if ($id) {

  	echo "selam";
	  print_r($id);
	  die('Bitti');

		$guncelle = new veriTabani();
		$sorgu    = $guncelle->kayitGuncelle('kullanicilar',
			$alanlar=array(
						  'kullanici_gorunen_adi',
						  'kullanici_adi',
						  'kullanici_epostasi',
						  'kullanici_parolasi',
						  'kullanici_yetkisi',
						  'kullanici_resim'),
			$degerler = array(
						  $_POST['kullanici_gorunen_adi'],
						  $_POST['kullanici_adi'],
						  $_POST['kullanici_epostasi'],
					md5($_POST['kullanici_parolasi']),
						  $_POST['kullanici_yetkisi'],
						  $_POST['kullanici_resim']),
			$sorgu_alan='kullanici_id',
			$sorgu_deger=$_POST['kullanici_id']);

			echo $sorgu;
	    echo'<meta http-equiv="refresh" content="0;URL=kullanicilar?id='.$_POST['kullanici_id'].'">';
  }



?>
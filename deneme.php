<?php 
  $kullanicilar = new veriTabani();
  $aday = $kullanicilar->tekKayitAl('kullanicilar', 'kAdi', 'aysubey');
  extract($aday);
  echo $kAdi;


  $SESSION['kullanici_gorunen_adi'] = $kullanici_gorunen_adi;
  $SESSION['kullanici_adi'] = $kullanici_adi;
  $SESSION['kullanici_yetkisi'] = $kullanici_yetkisi;
  $SESSION['kullanici_resimi'] = $kullanici_resimi;
 
// Header kullanmak istiyorsanız, sayfanın en başına "ob_start();" sayfanın en altına "ob_end_flush();" yazın. 
  header("Location: anasayfa.php");
  header("Location: " .$_SERVER['HTTP_REFERER']); // Mevcut sayfaya yönlendirir.
  echo'<meta http-equiv="refresh" content="0;URL=yoneleceksiteadresi">';

  //  TOPLU VERİ ÇEKME
  $hepsiniCek = new veriTabani();

  $bulunacak  = '1';
  $sql = "SELECT * FROM sayfalar WHERE sayfa_yetkisi=:aranan";
  $hepsiniCek->sorgula($sql);
  $hepsiniCek->bind(':aranan',$bulunacak);
  $satirlar = $hepsiniCek->tamCek();

  foreach ($satirlar as $satir) {
    $sayfa_id          = $satir['sayfa_id'];
    $sayfa_gorunen_adi = $satir['sayfa_gorunen_adi'];
    $sayfa_adi         = $satir['sayfa_adi'];
    $sayfa_yetkisi     = $satir['sayfa_yetkisi'];
    echo $sayfa_id . ". ".$sayfa_gorunen_adi." / ".$sayfa_adi." / ".$sayfa_yetkisi."<br>";
  }
?>
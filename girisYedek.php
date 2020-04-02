<?php 
  !defined('kontrol') ? die('Sayfaya bu şekilde ulaşamazsın!') : null ; 

  if (isset($_POST['btn_giris'])) {

    $kullanici_kontrol  = new veriTabani();

    $kullanici_epostasi = $_POST['kullanici_epostasi'];
    $kullanici_parolasi = $_POST['kullanici_parolasi'];

    $sql = "SELECT * FROM kullanicilar WHERE kullanici_epostasi=:eposta AND kullanici_parolasi=:parola";
    $kullanici_kontrol->sorgula($sql);
    $kullanici_kontrol->bind(':eposta',$kullanici_epostasi);
    $kullanici_kontrol->bind(':parola',$kullanici_parolasi);
    $satirlar = $kullanici_kontrol->tamCek();
    extract($satirlar);
    //$say = $kullanici_kontrol->satirsay();

    echo $satirlar['kullanici_epostasi'];
    die();

    if ($kullanici_epostasi == $satirlar['kullanici_epostasi']) { // E-Posta Varsa 
      echo '  
        <div class="container">  
          <div class="row">
            <div class="alert alert-danger col-md-6 offset-md-3 text-center mt-3">
              Böyle bir kullanıcı yok!
            </div>
          </div>
        </div>';
    }
    if ($kullanici_parolasi != $kullanici['kullanici_parolasi']) { // Parola Yanlışsa
      echo '  
        <div class="container">  
          <div class="row">
            <div class="alert alert-danger col-md-6 offset-md-3 text-center mt-3">
              Parolanız yanlış!
            </div>
          </div>
        </div>';
    }
    $_SESSION["kullanici_gorunen_adi"] = $kullanici_gorunen_adi;
    $_SESSION["kullanici_adi"] = $kullanici_adi;
    $_SESSION["kullanici_yetkisi"] = $kullanici_yetkisi;
    $_SESSION["kullanici_resimi"] = $kullanici_resimi;
    echo'<meta http-equiv="refresh" content="0;URL=anasayfa">';
  }


?>
  <!-- Page Content -->
  <div class="container my-3">
    <!-- Intro Content -->
    <div class="row">
      <div class="col-lg-4 offset-md-4 text-center p-5 rounded-lg" style="background-color: #f1c40f !important;">  
        <h3>AYSUBEY</h3>
        <h6>Yönetici Girişi</h6>   
        <form name="giris" id="giris" method="post" action="">
          <div class="control-group form-group">
            <div class="controls">
              <input type="email" class="form-control" id="kullanici_epostasi" name="kullanici_epostasi" required placeholder="E-Postanızı giriniz!">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <input type="password" class="form-control" id="kullanici_parolasi" name="kullanici_parolasi" required placeholder="Parolanızı giriniz!">
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" id="btn_giris" name="btn_giris">Giriş Yap</button>
        </form>
      </div>
    </div>    
    <!-- Intro Content -->
  </div>
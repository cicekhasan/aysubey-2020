<?php 
  !defined('kontrol') ? die('Sayfaya bu şekilde ulaşamazsın!') : null ; 

  $eposta = trim($_POST['kullanici_epostasi']);
  $parola = trim($_POST['kullanici_parolasi']);

  if (isset($_POST['btn_giris'])) {

    $kullanicilar = new veriTabani();
    $kullanici    = $kullanicilar->tekKayitAl('kullanicilar', 'kullanici_epostasi', $eposta);
    extract($kullanici);

    if ($kullanici_epostasi != htmlspecialchars($eposta)) {
      echo '  
        <div class="container">  
          <div class="row">
            <div class="alert alert-danger col-md-6 offset-md-3 text-center mt-3">
              "Kullanıcı Adınız" yanlış"!
            </div>
          </div>
        </div>';
      echo'<meta http-equiv="refresh" content="0;URL=giris">'; 
    }else{
      if ($kullanici_parolasi != htmlspecialchars($parola)) {
        echo '  
          <div class="container">  
            <div class="row">
              <div class="alert alert-danger col-md-6 offset-md-3 text-center mt-3">
                "Parolanız yanlış"!
              </div>
            </div>
          </div>';        
        echo'<meta http-equiv="refresh" content="0;URL=giris">';
      }else{
        $_SESSION["kullanici_gorunen_adi"] = $kullanici_gorunen_adi;
        $_SESSION["kullanici_adi"]         = $kullanici_adi;
        $_SESSION["kullanici_yetkisi"]     = $kullanici_yetkisi;
        $_SESSION["kullanici_resimi"]      = $kullanici_resimi;
        echo'<meta http-equiv="refresh" content="0;URL=yansayfa">';
      }
    }
  }
?>
  <!-- Page Content -->
  <div class="container my-3">
    <!-- Intro Content -->
    <div class="row">
      <div class="col-lg-4 offset-md-4 text-center p-5 rounded-lg" style="background-color: #f1c40f !important;">  
        <h3 class="font-weight-bolder">AYSUBEY</h3><br /> 
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
          <button type="submit" class="btn btn-primary btn-block" id="btn_giris" name="btn_giris">Yönetici Girişi Yap</button>
          <small class="text-danger"><i>Üye girişi değildir! Yöneticiler giriş yapabilir.</i></small>
        </form>
      </div>
    </div>    
    <!-- Intro Content -->
  </div>
<?php
  !defined('kontrol') ? die('Sayfaya bu şekilde ulaşamazsın!') : null ;
  session_start();
  if (!isset($_SESSION['kullanici_yetkisi']) && $_SESSION['kullanici_yetkisi'] != '1') {
    echo'<meta http-equiv="refresh" content="0;URL=anasayfa">';
    die();
  }
?>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Kullanıcılar</h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="anasayfa">Anasayfa</a>
      </li>
      <li class="breadcrumb-item active">Kullanıcılar</li>
    </ol>
    <div class="row my-3">
      <div class="col-md-5">
        <table class="table table-hover table-responsive-xl table-sm">
          <thead class="table-success">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">#</th>
              <th scope="col">Görünen Ad</th>
            </tr>
          </thead>
          <tbody>
      <?php

        $tablo = 'kullanicilar';
        $sutun = 'kullanici_gorunen_adi';
        $ngore = 'ASC';

        $kullanicilar       = new veriTabani();
        $gelen_kullanicilar = $kullanicilar->tumKayitAlSirali($tablo, $sutun, $ngore);

        foreach ($gelen_kullanicilar as $kullanici) {
          extract($kullanici);
          if ($kullanici) {
            echo '
              <tr>
                <td><a class="" href="?id='.$kullanici_id.'">'.$kullanici_id.'</a></td>
                <td>
                  <a class="" href="?id='.$kullanici_id.'">
                    <img class="img-fluid" src="'.$kullanici_resim.'" alt="'.$kullanici_adi.'" width=50>
                  </a>
                </td>
                <td><a class="" href="?id='.$kullanici_id.'">'.$kullanici_gorunen_adi.'</a></td>
              </tr>';
          }
        }
      ?>

          </tbody>
        </table>
      </div>
      <div class="col-md-7">
        <?php

          $id = $_GET['id'];
          $kullanici_read = new veriTabani();
          $sorgu          = $kullanici_read->tekKayitAl('kullanicilar', 'kullanici_id', $id);
          extract($sorgu);

            if (isset($id)) {

              echo '
        <form name="kullanici_crud" id="kullanici_crud" method="post" action="kullanici_crud.php" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-7">

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-users"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="ID" name="kullanici_id" value="'.$kullanici_id.'" disabled>
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-users"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Görünen Ad ve Soyad" required name="kullanici_gorunen_adi" value="'.$kullanici_gorunen_adi.'">
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="KullanıcıAdı" required name="kullanici_adi" value="'.$kullanici_adi.'">
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-mail-bulk"></i></span>
                </div>
                <input type="email" class="form-control" placeholder="E-Posta" required name="kullanici_epostasi" value="'.$kullanici_epostasi.'">
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-key"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Parola" required name="kullanici_parolasi" value="'.$kullanici_parolasi.'">
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-unlock-alt"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Yetki" required name="kullanici_yetkisi" value="'.$kullanici_yetkisi.'">
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-history"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Resim adresi..." required name="kullanici_resim" value="'.$kullanici_resim.'">
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-history"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Kayıt/Güncelleme Tarihi" value="'.$kullanici_kayit_tarihi.'" disabled>
              </div>

              <button type="submit" class="btn btn-primary mx-2" id="btn_edit" name="btn_edit">Güncelle</button>
              <button type="submit" class="btn btn-danger mx-2" id="btn_delete" name="btn_delete">Sil</button>
              <button type="submit" class="btn btn-warning mx-2" id="btn_clear" name="btn_clear">Temizle</button>
              <button type="submit" class="btn btn-success mx-2" id="btn_create" name="btn_create">Ekle</button>
            </div>
            <div class="col-md-5">            
              <div class="control-group form-group">
                <div class="controls border border-primary rounded-sm text-center p-1">                  
                  <img class="img-fluid" src="'.$kullanici_resim.'" alt="" width=200>
                </div>
              </div>
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="kullanici_resim" name="kullanici_resim" >
                  <label class="custom-file-label" for="kullanici_resim" aria-describedby="inputGroupFileAddon02">Resim seçin!</label>
                </div>
              </div>
            </div>
          </div>
        </form>
          ';
            }else{
              echo '<h3 class="text-danger">DİKKAT!</h3>
                <p class="text-justify"><i><b>
                    Lütfen, bilgilerini görmek istediğiniz, ya da güncelelemek istediğiniz ve ya silmek istediğiniz kullanıcıyı seçiniz.</b></i>
                </p>
                <p class="text-justify"><i><b>
                    Yeni bir kullanıcı eklemek için önce temizleme işlemiyapmanız gerekmektedir.</b></i>
                </p>
              ';
            }
        ?>
      </div>
    </div>
  </div>
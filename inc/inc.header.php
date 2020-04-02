<?php !defined('kontrol') ? die('Sayfaya bu şekilde ulaşamazsın!') : null ; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?= bilgi($anahtar,'tab_title'); ?></title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <!-- <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" /> --> 
  <script src="js/fontawesome.js" crossorigin="anonymous"></script>
  <style type="text/css" media="screen">
    .bg-navfoot{background-color: <?= bilgi($anahtar, 'bg-navfoot'); ?>;}
    .card-color{background-color: <?= bilgi($anahtar, 'card-color'); ?>;}
  </style>
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-navfoot">
    <div class="container-fluid">
      <a class="navbar-brand" href="anasayfa"><?= bilgi($anahtar, 'title'); ?></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php
            if (isset($_SESSION['kullanici_yetkisi']) && $_SESSION['kullanici_yetkisi'] == '1') {
              ust_menu('sayfalar', 'sayfa_sirasi', '1', 'ASC');
            }else{
              ust_menu('sayfalar', 'sayfa_sirasi', '0', 'ASC');
            }
          ?>
        </ul>        
        <form class="form-inline my-2 my-lg-0 ml-3">
          <input class="form-control mr-sm-2" type="search" placeholder="Site içi ara ..." aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ARA</button>
        </form>
      </div>
    </div>
  </nav>
  <!-- /Navigation -->
  <!-- Geçici -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container-fluid">
      <a class="navbar-brand" href="anasayfa">Geçici Menü</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle Geçici">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <php if($sayfa == 'anasayfa'){echo 'active';} ?>">
            <a class="nav-link" href="anasayfa">Anasayfa</a>
          </li>
          <li class="nav-item <php if($sayfa == 'anasayfa'){echo 'active';} ?>">
            <a class="nav-link" href="icons">İcons</a>
          </li>
          <li class="nav-item <php if($sayfa == 'hakkimizda'){echo 'active';} ?>">
            <a class="nav-link" href="hakkimizda">Hakkımızda</a>
          </li>
          <li class="nav-item <php if($sayfa == 'hizmetler'){echo 'active';} ?>">
            <a class="nav-link" href="hizmetler">Hizmetler</a>
          </li>
          <li class="nav-item <php if($sayfa == 'iletisim'){echo 'active';} ?>">
            <a class="nav-link" href="iletisim">İletişim</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <php if($sayfa == '1-kolon-sayfa' OR $sayfa == '2-kolon-sayfa' OR $sayfa == '3-kolon-sayfa' OR $sayfa == '4-kolon-sayfa' OR $sayfa == 'tek-sayfa'){echo 'active';} ?>" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sayfalar
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <a class="dropdown-item <php if($sayfa == '1-kolon-sayfa'){echo 'active';} ?>" href="<?= seo('1 kolonlu sayfa'); ?>">1 Kolonlu Sayfa</a>
              <a class="dropdown-item <php if($sayfa == '2-kolon-sayfa'){echo 'active';} ?>" href="<?= seo('2 kolonlu sayfa'); ?>">2 Kolonlu Sayfa</a>
              <a class="dropdown-item <php if($sayfa == '3-kolon-sayfa'){echo 'active';} ?>" href="<?= seo('3 kolonlu sayfa'); ?>">3 Kolonlu Sayfa</a>
              <a class="dropdown-item <php if($sayfa == '4-kolon-sayfa'){echo 'active';} ?>" href="<?= seo('4 kolonlu sayfa'); ?>">4 Kolonlu Sayfa</a>
              <a class="dropdown-item <php if($sayfa == 'tek-sayfa'){echo 'active';} ?>"     href="<?= seo('tek sayfa'); ?>">Tek Sayfa</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <php if($sayfa == '1.-blog-anasayfa' OR $sayfa == '2.-blog-anasayfa' OR $sayfa == 'ilet-sayfasi'){echo 'active';} ?>" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Blog
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item <php if($sayfa == '1.-blog-anasayfa'){echo 'active';} ?>" href="<?= seo('1. blog anasayfa'); ?>">1. Blog Anasayfa</a>
              <a class="dropdown-item <php if($sayfa == '2.-blog-anasayfa'){echo 'active';} ?>" href="<?= seo('2. blog anasayfa'); ?>">2. Blog Anasayfa</a>
              <a class="dropdown-item <php if($sayfa == 'ilet-sayfasi'){echo 'active';} ?>" href="<?= seo('ilet sayfasi'); ?>">İlet Sayfası</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <php if($sayfa == 'genis-sayfa' OR $sayfa == 'kenar-cubugu' OR $sayfa == 'sik-sorulan-sorular' OR $sayfa == '404' OR $sayfa == 'fiyatlandirma-tablosu'){echo 'active';} ?>" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Diğer Sayfalar
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item <php if($sayfa == 'genis-sayfa'){echo 'active';} ?>" href="<?= seo('genis sayfa'); ?>">Geniş Sayfa</a>
              <a class="dropdown-item <php if($sayfa == 'kenar-cubugu'){echo 'active';} ?>" href="<?= seo('kenar cubugu'); ?>">Kenar Çubuğu</a>
              <a class="dropdown-item <php if($sayfa == 'sik-sorulan-sorular'){echo 'active';} ?>" href="<?= seo('sik sorulan sorular'); ?>">SSS</a>
              <a class="dropdown-item <php if($sayfa == '404'){echo 'active';} ?>" href="<?= seo('404'); ?>">404 Hata</a>
              <a class="dropdown-item <php if($sayfa == 'fiyatlandirma-tablosu'){echo 'active';} ?>" href="<?= seo('fiyatlandirma tablosu'); ?>">Fiyatlandırma Tablosu</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- /Geçici -->
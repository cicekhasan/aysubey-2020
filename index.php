<?php
  session_start();  
  require 'baglan.php'; 
  require 'inc/fonksiyonlar.php';

  $sayfa = $_GET['sayfa'];

  include('inc/inc.header.php');

  if (!isset($sayfa) OR $sayfa == 'anasayfa') {
    include 'inc/inc.carousel.php'; 
  }

  $arrSayfalar = array();
  $arrSayfalar[] = 'anasayfa';
  $arrSayfalar[] = 'hakkimizda';
  $arrSayfalar[] = 'hizmetler';
  $arrSayfalar[] = 'iletisim';
  $arrSayfalar[] = '1-kolonlu-sayfa';
  $arrSayfalar[] = '2-kolonlu-sayfa';
  $arrSayfalar[] = '3-kolonlu-sayfa';
  $arrSayfalar[] = '4-kolonlu-sayfa';
  $arrSayfalar[] = 'tek-sayfa';
  $arrSayfalar[] = '1.-blog-anasayfa';
  $arrSayfalar[] = '2.-blog-anasayfa';
  $arrSayfalar[] = 'ilet-sayfasi';
  $arrSayfalar[] = 'genis-sayfa';
  $arrSayfalar[] = 'kenar-cubugu';
  $arrSayfalar[] = 'sik-sorulan-sorular';
  $arrSayfalar[] = '404';
  $arrSayfalar[] = 'fiyatlandirma-tablosu';
  $arrSayfalar[] = 'giris';
  $arrSayfalar[] = 'cikis';
  $arrSayfalar[] = 'iceriler';
  $arrSayfalar[] = 'kullanicilar';
  $arrSayfalar[] = 'mesajlar';
  $arrSayfalar[] = 'icons';
  $arrSayfalar[] = 'yansayfa';

  if( in_array($sayfa, $arrSayfalar)) $Yukle = $sayfa;
  include $Yukle . '.php';
  include('inc/inc.footer.php'); 
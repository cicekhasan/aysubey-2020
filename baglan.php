 <?php
// SAYFA KONTROLU İÇİN TANIMLAMA
// Sadece index.php'de olacak.
define('kontrol', true);
// Aşağıdaki kod her sayfanın ik başında olmak zorunda. Php etiketleri içerisinde olmalı!
// !defined('kontrol') ? die('Sayfaya bu şekilde ulaşamazsın!') : null ;

// VERİTABANI MYSQL BAĞLANTISI İÇİN PARAMETRE TANIMLARI
define("DB_HOST", "localhost"); // Bağlanılacak Sunucu IP veya Adresi
define("DB_USER", "root");      // Kullanıcı adı
define("DB_PASS", "xxx");// Veritabanı parolası
define("DB_NAME", "xxx");   // Veritabanı adı
define("CHARSET", "utf8");
define("COLLATE", "utf8_unicode_ci");
?>
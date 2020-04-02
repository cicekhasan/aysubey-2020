-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `aysubey` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci */;
USE `aysubey`;

DROP TABLE IF EXISTS `haberler`;
CREATE TABLE `haberler` (
  `haber_id` int(11) NOT NULL AUTO_INCREMENT,
  `haber_gorunen_adi` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `haber_adi` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `haber_durumu` int(11) NOT NULL DEFAULT 0,
  `haber_sirasi` int(11) NOT NULL DEFAULT 0,
  `haber_resim` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'uploads/haber.jpg',
  `haber_kayit_tarihi` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `haber_guncelleme_tarihi` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`haber_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `icerikler`;
CREATE TABLE `icerikler` (
  `icerik_id` int(11) NOT NULL AUTO_INCREMENT,
  `icerik_gorunen_adi` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `icerik_adi` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `icerik_yetkisi` int(11) NOT NULL DEFAULT 0,
  `icerik_durumu` int(11) NOT NULL DEFAULT 0,
  `icerik_kategori_id` int(11) NOT NULL DEFAULT 1,
  `icerik_resim` varchar(500) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'uploads/icerik.jpg',
  `icerik_kayit_tarihi` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `icerik_guncelleme_tarihi` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`icerik_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;


DROP TABLE IF EXISTS `kategoriler`;
CREATE TABLE `kategoriler` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_gorunen_adi` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_adi` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_durumu` int(11) NOT NULL DEFAULT 0,
  `kategori_sirasi` int(11) NOT NULL DEFAULT 0,
  `kategori_resim` varchar(300) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'uploads/kategori.jpg',
  `kategori_kayit_tarihi` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `kategori_guncelleme_tarihi` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO `kategoriler` (`kategori_id`, `kategori_gorunen_adi`, `kategori_adi`, `kategori_durumu`, `kategori_sirasi`, `kategori_resim`, `kategori_kayit_tarihi`, `kategori_guncelleme_tarihi`) VALUES
(1,	'Genel',	'genel',	1,	0,	'uploads/kategori.jpg',	'2020-02-16 11:05:07',	'2020-02-16 11:05:07');

DROP TABLE IF EXISTS `kullanicilar`;
CREATE TABLE `kullanicilar` (
  `kullanici_id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici_gorunen_adi` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adi` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_epostasi` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_parolasi` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_yetkisi` int(5) NOT NULL DEFAULT 0,
  `kullanici_resim` varchar(300) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'uploads/kayit.jpg',
  `kullanici_kayit_tarihi` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`kullanici_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO `kullanicilar` (`kullanici_id`, `kullanici_gorunen_adi`, `kullanici_adi`, `kullanici_epostasi`, `kullanici_parolasi`, `kullanici_yetkisi`, `kullanici_resim`, `kullanici_kayit_tarihi`) VALUES
(1,	'Hasan Çiçek',	'aysubey',	'aysubey@gmail.com',	'Armada1453**',	1,	'uploads/kayit.jpg',	'2020-02-15 09:47:32'),
(2,	'Ay Makale',	'aymakale',	'aymakale@gmail.com',	'hasancicek',	1,	'uploads/kayit.jpg',	'2020-02-15 19:44:21');

DROP TABLE IF EXISTS `sayfalar`;
CREATE TABLE `sayfalar` (
  `sayfa_id` int(11) NOT NULL AUTO_INCREMENT,
  `sayfa_gorunen_adi` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_adi` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_yetkisi` int(11) NOT NULL DEFAULT 0,
  `sayfa_durumu` int(11) NOT NULL DEFAULT 0,
  `sayfa_sirasi` int(11) NOT NULL,
  `sayfa_icerigi` text COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_kayit_tarihi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sayfa_guncelleme_tarihi` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`sayfa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO `sayfalar` (`sayfa_id`, `sayfa_gorunen_adi`, `sayfa_adi`, `sayfa_yetkisi`, `sayfa_durumu`, `sayfa_sirasi`, `sayfa_icerigi`, `sayfa_kayit_tarihi`, `sayfa_guncelleme_tarihi`) VALUES
(1,	'Anasayfa',	'anasayfa',	0,	1,	1,	'',	'2020-02-16 09:59:38',	'0000-00-00 00:00:00'),
(2,	'Hakkımızda',	'hakkimizda',	0,	1,	3,	'',	'2020-02-16 09:59:38',	'0000-00-00 00:00:00'),
(3,	'İletişim',	'iletisim',	0,	1,	4,	'',	'2020-02-16 09:59:38',	'0000-00-00 00:00:00'),
(4,	'<i class=\"fa fa-eye\"></i><br />',	'giris',	0,	1,	20,	'',	'2020-02-17 20:21:36',	'2020-02-17 20:21:36'),
(5,	'Anasayfa',	'anasayfa',	1,	1,	1,	'',	'2020-02-16 09:59:38',	'0000-00-00 00:00:00'),
(6,	'İçerikler',	'icerikler',	1,	1,	3,	'',	'2020-02-16 09:59:38',	'0000-00-00 00:00:00'),
(7,	'Kullanıcılar',	'kullanicilar',	1,	1,	4,	'',	'2020-02-16 09:59:38',	'0000-00-00 00:00:00'),
(8,	'Mesajlar',	'mesajlar',	1,	1,	5,	'',	'2020-02-16 09:59:38',	'0000-00-00 00:00:00'),
(9,	'Çıkış',	'cikis',	1,	1,	20,	'',	'2020-02-16 09:59:38',	'0000-00-00 00:00:00'),
(10,	'Kategoriler',	'kategoriler',	0,	1,	2,	'',	'2020-02-16 09:59:38',	'0000-00-00 00:00:00'),
(11,	'Kategoriler',	'kategoriler',	1,	1,	2,	'',	'2020-02-16 09:59:38',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `site_bilgileri`;
CREATE TABLE `site_bilgileri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anahtar` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `degeri` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `guncelleme_tarihi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO `site_bilgileri` (`id`, `anahtar`, `degeri`, `guncelleme_tarihi`) VALUES
(1,	'title',	'<i class=\"fa fa-star-and-crescent\"></i> Aysubey 2020',	'2020-02-17 14:59:30'),
(2,	'slogan',	'Bilgi paylaşıldıkça çoğalır...',	'2020-02-08 08:32:57'),
(3,	'eposta',	'aysubey@gmail.com',	'2020-02-12 18:56:34'),
(4,	'footer',	'Özgür Yazılım &copy; aysubey.com',	'2020-02-14 16:28:57'),
(5,	'bg-navfoot',	' hsl(123, 40%, 25%)',	'2020-02-15 00:43:16'),
(6,	'card-color',	'hsl(123, 40%, 40%)',	'2020-02-15 00:44:04'),
(7,	'card-size',	'14',	'2020-02-12 19:07:26'),
(8,	'article-size',	'12',	'2020-02-12 19:07:13'),
(9,	'tab_title',	'Aysubey',	'2020-02-17 15:01:46');

-- 2020-02-18 08:10:19

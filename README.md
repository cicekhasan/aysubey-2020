# AYSUBEY 2020 TEMA ÇALIŞMASI

#### Yapılacak işler;

- [X] PDO ve MySql kullanıacak,
- [X] Site değişken bilgileri veritabanından çekilecek,
- [X] Menü veritabanından çekilecek (Kullanıcı ve yönetici menüsü ayrı olacak),
- [X] Yönetim için kullanıcı girişi yapılacak,
- [ ] Yönetici kullanicilar.php oluşturulacak;
	- [X] "kullanicilar" tablosu oluşturulacak,
	- [ ] Kullanıcılar tablo olarak listelenecek (Ekranın sol tarafı md-5),
	- [ ] Son sütunda gör, düzenle ve sil olacak,
	- [ ] Eylemler ekranın sağında yapılacak.
- [ ] Yönetici dashboard.php oluşturulacak;
	- [ ] Adetler listelenecek,
	- [ ] Yeni mesajlar görüntülenecek,
	- [ ] Site giriş istatistiği görüntülenecek.
- [ ] Yönetici kategoriler.php oluşturulacak;
	- [X] "kategoriler" tablosu oluşturulacak,
	- [ ] Kategoriler tablo olarak listelenecek (Ekranın sol tarafı md-5),
	- [ ] Son sütunda gör, düzenle ve sil olacak,
	- [ ] Eylemler ekranın sağında yapılacak.
- [ ] Yönetici icerikler.php oluşturulacak;
	- [X] "icerikler" tablosu oluşturulacak,
	- [ ] İçeriler tablo olarak listelenecek (Ekranın sol tarafı md-5),
	- [ ] Son sütunda gör, düzenle ve sil olacak,
	- [ ] Eylemler kullanıcı içerik.php'de yapılacak.
- [ ] Yönetici icerik.php oluşturulacak;
	- [ ] Metin editörü eklenecek,
	- [ ] İçeriğe ait resim ekleme olacak,
	- [ ] Görüntüleme için kullanıcı içerik.php kullanılacak.
- [ ] Yönetici sayfalar.php oluşturulacak;
	- [X] "sayfalar" tablosu oluşturulacak,
	- [ ] Sayfalar tablo olarak listelenecek (Ekranın sol tarafı md-5),
	- [ ] Son sütunda gör, düzenle ve sil olacak,
	- [ ] Eylemler kullanıcı içerik.php'de yapılacak.
- [ ] Yönetici haberler.php oluşturulacak;
	- [X] "haberler" tablosu oluşturulacak,
	- [ ] Haberler tablo olarak listelenecek (Ekranın sol tarafı md-5),
	- [ ] Son sütunda gör, düzenle ve sil olacak,
	- [ ] Haberler için slayt boyutlarında resimler eklenebilecek,
	- [ ] Eylemler kullanıcı içerik.php'de yapılacak.
- [ ] ayarlar.php sayfası oluşturulacak;
	- [X] "site_bilgileri" tablosu oluşturulacak,
	- [X] Site ayarları veritabanından çekilecek;
		- [X] Site adı,
		- [X] Site logosu,
		- [X] Site sloganı,
		- [X] Site ana rengi (nav, card),
		- [X] Site footer yazısı,
		- [ ] Bakım modu.
- [ ] Kullanıcı anasayfa.php oluşturulacak;
	- [ ] Slayt'ta site haberleri görünecek (son üç haber),
	- [ ] 3 ya da 4 card kullanılacak (Karışık içerik),
	- [ ] Son 3 içerik yatay 3 card olacak.
- [ ] Kullanıcı kategoriler.php oluşturulacak;
	- [ ] Kategoriler sağ sütunda listelenecek (md-4),
	- [ ] Seçilen kategori içeriği solda listelenecek (md-8),
	- [ ] İçerik seçildiğinde içerik.php'de görüntülenecek.
- [ ] Kullanıcı hakkimizda.php oluşturulacak;
	- [ ] Site oluşturulurken faydalanılan kaynaklar buraya eklenecek.
- [ ] Kullanıcı İletişim oluşturulacak;
	- [ ] Kullanıcıların mesaj atabilecekleri alan olacak,
	- [ ] İletişim bilgileri (Ad ve Soyad, E-Posta) olacak,
	- [ ] Haritaya Ankara ayarlanacak.
- [ ] Kullanıcı icerik.php oluşturulacak;
	- [ ] Sağ bölümde kategori listesi olacak,
	- [ ] İçerik kategorigi belirginleştirilecek,
	- [ ] Yorum yapılabilecek alan olacak,
	- [ ] İçerik konusundaki içerik listesi olacak,
	- [ ] Sütunlar şeklinde gösterilecek. Örnek; aşağıda.
- [ ] Genel ayarlar;
	- [ ] Genel ayarlar veritabanından çekilecek,
- [X] Fontawesomesimgeleri dahili olarak eklenecek,
- [ ] Örnek sayfalar ve gereksiz dosyalar silinecek.

### TABLOLAR

- [X] **Tablo Adı:** site_bilgileri;

	| Kolon | Tür | Yorum |
	|--- | --- | --- |
	| id                | int | (11) Otomatik Artır |
	| anahtar           | varchar | (100) |
	| degeri            | varchar | (1000) |
	| guncelleme_tarihi | timestamp | [current_timestamp()] |

- [X] **Tablo Adı:** kullanicilar;

	| Kolon | Tür | Yorum |
	|--- | --- | --- |
	| kullanici_id           | int | (11) Otomatik Artır |
	| kullanici_gorunen_adi  | varchar | (150) |
	| kullanici_adi          | varchar | (150) |
	| kullanici_epostasi     | varchar | (150) |
	| kullanici_parolasi     | varchar | (300) |
	| kullanici_yetkisi      | int | (5) Varsayılan [0] |
	| kullanici_resim        | varchar | (300) Varsayılan [uploads/kullanici.jpg] |
	| kullanici_kayit_tarihi | timestamp | [current_timestamp()] |

- [X] **Tablo Adı:** sayfalar;

	| Kolon | Tür | Yorum |
	|--- | --- | --- |
	| sayfa_id                | int | (11) Otomatik Artır |
	| sayfa_gorunen_adi       | varchar | (200) |
	| sayfa_adi               | varchar | (200) |
	| sayfa_yetkisi           | int | (11) [0] |
	| sayfa_durumu            | int | (11) [0] |
	| sayfa_sirasi            | int | (11) |
	| sayfa_icerigi	          | text | |
	| sayfa_kayit_tarihi      | timestamp | [current_timestamp()] |
	| sayfa_guncelleme_tarihi | timestamp | [current_timestamp()] |

- [X] **Tablo Adı:** kategoriler;

	| Kolon | Tür | Yorum |
	|--- | --- | --- |
	| kategori_id                | int | (11) Otomatik Artır |
	| kategori_gorunen_adi       | varchar | (200) |
	| kategori_adi               | varchar | (200) |
	| kategori_durumu            | int | (11) [0] |
	| kategori_sirasi            | int | (11) [0] |
	| kategori_resim             | varchar | (300) Varsayılan [uploads/kategori.jpg] |
	| kategori_kayit_tarihi      | timestamp | [current_timestamp()] |
	| kategori_guncelleme_tarihi | timestamp | [current_timestamp()] |

- [X] **Tablo Adı:** icerikler;

	| Kolon | Tür | Yorum |
	|--- | --- | --- |
	| icerik_id                | int | (11) Otomatik Artır |
	| icerik_gorunen_adi       | varchar | (300) |
	| icerik_adi               | varchar | (300) |
	| icerik_yetkisi           | int | (11) Varsayılan [0] |
	| icerik_durumu            | int | (11) Varsayılan [0] |
	| icerik_kategori_id       | int | (11) Varsayılan [0]/[0:Genel Kategorisi] |
	| icerik_resim      			 | varchar | (300) Varsayılan [uploads/icerik.jpg] |
	| icerik_kayit_tarihi      | timestamp | [current_timestamp()] |
	| icerik_guncelleme_tarihi | timestamp | [current_timestamp()] |

- [X] **Tablo Adı:** haberler;

	| Kolon | Tür | Yorum |
	|--- | --- | --- |
	| haber_id                | int | (11) Otomatik Artır |
	| haber_gorunen_adi       | varchar | (300) |
	| haber_adi               | varchar | (300) |
	| haber_durumu            | int | (11) [0] |
	| haber_sirasi            | int | (11) [0] |
	| haber_resim             | varchar | (300) Varsayılan [uploads/haber.jpg] |
	| haber_kayit_tarihi      | timestamp | [current_timestamp()] |
	| haber_guncelleme_tarihi | timestamp | [current_timestamp()] |

##### Sütun yapısı kullanımı

```php
<style> 
	.newspaper {
	  column-count: 3;
	}
</style>
<div class="newspaper">İÇERİK</div>
```

##### Fontawesome Kullanımı

Fontawesome dahili "fontawesome.js" dosyasından çekilmektedir. Kullanmak için aşağıdaki "fa-ad" yerine Fontawesome sayfasından seçtiğiniz her hangi bir simgenin isim kodunu yazınız. 

```php
<i class="fa fa-camera"></i><br />
# Ya da
<span class="fas fa-camera"></span>
```

Boyutve renk örnekleri;

```php 
<span style="font-size: 3em; color: Tomato;">
  <i class="fas fa-camera"></i>
</span>

<span style="font-size: 48px; color: Dodgerblue;">
  <i class="fas fa-camera"></i>
</span>

<span style="font-size: 3rem;">
  <span style="color: Mediumslateblue;">
  <i class="fas fa-camera"></i>
  </span>
</span>
```
<?php 
// Private: Sadece sınıf içerisinden erişilebilen değişkenler.
// Public: Sınıfın dışından da erişilebilen değişkenler.

// veriTabani SINIFI
class veriTabani{ 
	// baglan.php'den gelen parametreler;
  private $host    = DB_HOST;
  private $user    = DB_USER;
  private $pass    = DB_PASS;
  private $dbname  = DB_NAME;
  private $charset = CHARSET;
  private $collate = COLLATE;

  private $dbh;
  private $error;
  private $stmt;

	// YAPICI METHOD
  function __construct() {
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname.";";
    //PDO PARAMETRELERİ 
    $options = array(
		  PDO::ATTR_PERSISTENT => false,
    	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		  PDO::ATTR_EMULATE_PREPARES => false,
		  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		  //PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $charset COLLATE $collate"

    );
    // PDO VERİTABANI BAĞLANTISI
    try{
      $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
      //$this->dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Hataları yakalamak için!
      $this->dbh->exec("SET CHARACTER SET utf8");
    }
    catch(PDOException $e) {
      $this->error = "Baglanti Hatasi:".$e->getMessage();
    }
  }

  // PUBLIC METHOD
  // Sorgula metodu(fonksiyonu) gönderilen SQL sorgusunu hazırlar
  // Dışarıdan veri alabilen fonksiyon. $sql fonksiyondan önde oluşturulması gerekmektedir.
  public function sorgula($sql) {
    $this->stmt = $this->dbh->prepare($sql);
  }

  //Çalıştır metodu ise hazırlanan sorguyu çalıştırır.
  public function calistir($parametre=null) { 
    return $this->stmt->execute($parametre);
  }

  //tekKayitAl metodu verilen tablo adından istenen alana(kolona) göre verilen değeri sorgular.  
  public function tekKayitAl($tablo, $alan, $deger) {
    $sql = "SELECT * FROM ".$tablo." WHERE ".$alan." = ?";
    $this->sorgula($sql);
    $this->calistir(array($deger));
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
  }

  //Veritabanında tek kayıt çeker
  public function tekCek() { 
    $this->calistir();
    return $this->stmt->fetch(PDO::FETCH_ASSOC );
  }

  //Veritabanındaki birden fazla satır çeker
  public function tamCek() { 
    $this->calistir();
    return $this->stmt->fetchAll(PDO::FETCH_BOTH );
  }

  //İşlemler yapıldıktan sonra bağlatı için gereklidir.
  public function bind($parametre, $deger, $tip = null) {
    if (is_null($tip)) {
      switch (true) {
        case is_int($deger):
          $tip = PDO::PARAM_INT;
          break;
        case is_bool($deger):
          $tip = PDO::PARAM_BOOL;
          break;
        case is_null($deger):
          $tip = PDO::PARAM_NULL;
          break;
        default:
          $tip = PDO::PARAM_STR;
      }
    }
    $this->stmt->bindValue($parametre, $deger, $tip);
  }

  //Verilen tablo ismine ve alanlara göre tüm kayıtları çeker
  public function tumKayitAl($tablo, $alan=null, $deger=null) {
	  if ($alan!= null && $deger !=null)
	  	$sql = "SELECT * FROM ".$tablo." WHERE ".$alan."=".$deger;
	  else
      $sql = "SELECT * FROM ".$tablo;
	         
	  //try{
	  $this->sorgula($sql);
	  $this->calistir();
	  return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	  //} catch (Exception $e) {
	  // die("tumKayitAl() fonksiyonunda sorgu hatası");
	  //}
  }

  //Verilen tablo ismine ve alanlara göre tüm kayıtları çeker
  public function tumKayitAlSirali($tablo, $ngore=null, $sira='ASC') {
	  if ($ngore!= null)
	  	$sql = "SELECT * FROM ".$tablo." ORDER BY ".$ngore." ".$sira;
	  else
      $sql = "SELECT * FROM ".$tablo;
	         
	  //try{
	  $this->sorgula($sql);
	  $this->calistir();
	  return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	  //} catch (Exception $e) {
	  // die("tumKayitAl() fonksiyonunda sorgu hatası");
	  //}
  }
   
  //Kayıt Ekleme(INSERT) yapan fonksiyon, tablo ismi alır, dizi şekilde alanlar ve değerler alınır.
  public function kayitEkle($tablo, $alanlar=array(), $degerler = array()) { 
	  $sql1= implode(',', $alanlar);
	  $sql2= implode(',', array_fill(0, count($degerler), '?'));
	   
    $sql = 'INSERT INTO '.$tablo;
    $sql .= '('.$sql1.') ';
    $sql .= 'VALUES ('.$sql2.')';
	   
    try{
		  $this->sorgula($sql);
		  $this->calistir(array_values($degerler));
		  return $this->sonEklenenID(); 
	  }catch (Exception $e) {
		  die("kayitEkle() fonksiyonunda sorgu hatası");
		  return 0;
	  }
  }

  //Kayıt Güncelleme (UPDATE) yapar, dizi şeklinde güncellenecek alan ve değerleri alınır
  // $sorgu_alan parametresi ile WHERE şartı yazılır
  public function kayitGuncelle($tablo, $alanlar=array(), $degerler = array(), $sorgu_alan=NULL, $sorgu_deger=NULL) {
	  $set = '';
	  for($i=0; $i<count($alanlar);$i++) {
		  $set .= "`$alanlar[$i]` = ?";
		  if ($i!=count($alanlar)-1) $set.=",";
	  }
	  if ($sorgu_alan!=NULL && $sorgu_deger!=NULL)
	  	$sql  = "UPDATE $tablo SET ".$set." WHERE $sorgu_alan=?";
	  else 
	  	$sql = "UPDATE $tablo SET ".$set;
	  	//echo $sql; 
	   
	  try{
		  $this->sorgula($sql);
		  if ($sorgu_alan!=NULL) {
			  $degerler[] = $sorgu_deger;
			  $this->calistir($degerler);
		  }else $this->calistir($degerler);
		   
		  return 1;
	  } catch (Exception $e) {
		  die("kayitGuncelle() fonksiyonunda sorgu hatasi.");
		  return 0;
	  }   
  }

  //Verilen tablodan $alan isimli değişkene $deger parametresiyle gönderilen değeri siler.
  public function tekKayitSil($tablo, $alan, $deger) {
	  $sql = "DELETE FROM ".$tablo." WHERE ".$alan." = ?";
	  try{
		  $this->sorgula($sql);
		  $this->calistir(array($deger));
		  return 1;
	  } catch(Exception $e) {
		  die("tekKayitSil() fonksiyonunda sorgu hatası");
		  return 0; 
	  }
  }

  //İşlem sonucunda etkilenen kayıt sayısı alınır
  public function satirSay() {
  	return $this->stmt->rowCount();
  }

  //Veritabnına ekleme yapıldığında veritabanı tarafından verilen son ID değerini döndürür.
  public function sonEklenenID() {
  	return $this->dbh->lastInsertId();
  }

  //TRANSACTION işlemini başlatır. Eğer birden fazla (toplu) sorgu çalıştıracaksanız 
  //ve bu sorguların hep beraber işletilmesi gerekiyorsa transaction kullanırsınız.
  public function islemeBasla() {
  	return $this->dbh->beginTransaction();
  }

  // Transaction işlemini onaylar(commit) eder.
  public function islemiBitir() {
  	return $this->dbh->commit();
  }

  //Sorgulardan birinde hata alınan transaction işlemini sonlandırır. 
  public function islemIptal() {
  	return $this->dbh->rollBack();
  }
   
  public function parametreGoster() {
  	return $this->stmt->debugDumpParams();
  }
} //class

// Makale başlığını adres çubuğuna SEO uyumlu yazdırmak;
// Aralarına - koyarak yazdırma;
function seo($text)
{
$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$text = strtolower(str_replace($find, $replace, $text));
$text = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $text);
$text = trim(preg_replace('/\s+/', ' ', $text));
$text = str_replace(' ', '-', $text);
return $text;
}

// Kullanımı
// echo seo("Bu yazıdaki tüm türkçe karakterler düzeltilecektir.");
// Çıktı: bu-yazidaki-tum-turkce-karakterler-duzeltilecektir.


// YÖNLENDİRME
function go ($url, $time = 0){
    if ($time) header("Refresh: {$time}; url={$url}");
    else header("Location: {$url}");
}

// Kullanımı
// go("siteadi.com", 10);

// Ya da
// go("siteadi.com");

// SİTE BİLGİLERİ
$bilgi   = new veriTabani();
$anahtar = $bilgi->tumKayitAl('site_bilgileri');

function bilgi($anahtar, $deger) {
  foreach ($anahtar as $anahtar_degeri) {
    if ($anahtar_degeri['anahtar']==$deger) {
      echo $anahtar_degeri['degeri'];
    }
  }
}

// ÜST MENÜ ELEMANLARI
function ust_menu($tablo, $sutun, $deger, $ngore) {

	$sayfalar       = new veriTabani();
	$gelen_sayfalar = $sayfalar->tumKayitAlSirali($tablo, $sutun, $ngore); // ASC VEYA DESC

  foreach ($gelen_sayfalar as $sayfa) {
    if ($sayfa['sayfa_yetkisi']==$deger) {
    	echo '
    		<li class="nav-item">
          <a class="nav-link" href="'.$sayfa['sayfa_adi'].'">'.$sayfa['sayfa_gorunen_adi'].'</a>
        </li>';
    }
  }
}

// TABLO YAPMA
// $sutun bir dizidir! $ngore ASC yada DESC olacak!
function kullanicilar ($tablo, $sutun, $ngore) {

	$kullanicilar       = new veriTabani();
	$gelen_kullanicilar = $kullanicilar->tumKayitAlSirali($tablo, $sutun, $ngore); // ASC VEYA DESC

  foreach ($gelen_kullanicilar as $kullanici) {
    if ($kullanici) {
    	echo '
    		<tr>
          <td><a class="" href="'.$kullanici['kullanici_id'].'">'.$kullanici['sayfa_gorunen_adi'].'</a></td>
        </tr>';
    }
  }
}

// tumKayitAlSirali($tablo, $ngore=null, $sira='ASC')
?>
<?php 
ob_start();
session_start();

include 'baglan.php';
include '../production/fonksiyon.php';



if (isset($_POST['kullanicikaydet'])) {
	
	$kullanici_adsoyad=htmlspecialchars($_POST['kullanici_adsoyad']);
	$kullanici_mail=htmlspecialchars($_POST['kullanici_mail']);
	$kullanici_passwordone=$_POST['kullanici_passwordone']; 
	$kullanici_passwordtwo=$_POST['kullanici_passwordtwo'];

	if ($kullanici_passwordone==$kullanici_passwordtwo) {

		if (strlen($kullanici_passwordone)>5) {
			
// Başlangıç

			$kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail");
			$kullanicisor->execute(array(
				'mail' => $kullanici_mail
			));

			//dönen satır sayısını belirtir
			$say=$kullanicisor->rowCount();

			if ($say==0) {

				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password=md5($kullanici_passwordone);

				$kullanici_yetki=1;

			//Kullanıcı kayıt işlemi yapılıyor...
				$kullanicikaydet=$db->prepare("INSERT INTO kullanici SET
					kullanici_adsoyad=:kullanici_adsoyad,
					kullanici_mail=:kullanici_mail,
					kullanici_password=:kullanici_password,
					kullanici_yetki=:kullanici_yetki
					");
				$insert=$kullanicikaydet->execute(array(
					'kullanici_adsoyad' => $kullanici_adsoyad,
					'kullanici_mail' => $kullanici_mail,
					'kullanici_password' => $password,
					'kullanici_yetki' => $kullanici_yetki
				));

				if ($insert) {

					header("Location:../../index.php?durum=loginbasarili");

				} else {

					header("Location:../../register.php?durum=basarisiz");

				}

			} else {

				header("Location:../../register.php?durum=mukerrerkayit");

			}
		// Bitiş

		} else {

			header("Location:../../register.php?durum=eksiksifre");

		}

	} else {

		header("Location:../../register.php?durum=farklisifre");

	}
}



if(isset($_POST['sliderkaydet'])){

	//yükleme klasörü
	$uploads_dir = '../../dimg/slider';

	@$tmp_name=$_FILES['slider_resimyol']['tmp_name'];
	@$name =$_FILES['slider_resimyol']['name'];


	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizad = $benzersizsayi1.$benzersizsayi2;

	//belirlenen sayıdan sonrasını göster
	$refimgyol=substr($uploads_dir,6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");


	$kaydet=$db->prepare("INSERT INTO slider SET
		slider_isim=:slider_isim,
		slider_sira=:slider_sira,
		slider_link=:slider_link,
		slider_resimyol=:slider_resimyol
		");
	$insert=$kaydet->execute(array(
		'slider_isim' => $_POST['slider_isim'],
		'slider_sira' => $_POST['slider_sira'],
		'slider_link' => $_POST['slider_link'],
		'slider_resimyol' => $refimgyol
	));

	if ($insert) {

		Header("Location:../production/slider.php?durum=ok");

	} else {

		Header("Location:../production/slider.php?durum=no");
	}


}

if (isset($_POST['sliderduzenle'])) {

	$slider_id=$_POST['slider_id'];

	$ayarkaydet=$db->prepare("UPDATE slider SET
		slider_isim=:slider_isim,
		slider_link=:slider_link,
		slider_sira=:slider_sira,
		slider_durum=:slider_durum
		WHERE slider_id={$_POST['slider_id']}");

	$update=$ayarkaydet->execute(array(
		'slider_isim' => $_POST['slider_isim'],
		'slider_link' => $_POST['slider_link'],
		'slider_sira' => $_POST['slider_sira'],
		'slider_durum' => $_POST['slider_durum']
	));


	if ($update) {

		Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");

	} else {

		Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=no");
	}

}

if (isset($_POST['slideriptal'])) {

	Header("Location:../production/slider.php");

}

if ($_GET['slidersil']=="ok") {

	$sil=$db->prepare("DELETE from slider where slider_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['slider_id']
	));

	
	if ($kontrol) {

		Header("Location:../production/slider.php?sil=ok");

	} else {

		Header("Location:../production/slider.php?sil=no");
	}

}

if(isset($_POST['logoduzenle'])){

	//yükleme klasörü
	$uploads_dir = '../../dimg';

	@$tmp_name=$_FILES['ayar_logo']['tmp_name'];
	@$name =$_FILES['ayar_logo']['name'];

	$benzersizsayi=rand(20000,32000);
	//belirlenen sayıdan sonrasını göster
	$refimgyol=substr($uploads_dir,6)."/".$benzersizsayi.$name;


	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi$name");

	$duzenle=$db->prepare("UPDATE ayar SET
		ayar_logo=:logo
		WHERE ayar_id=0");
	$update=$duzenle->execute(array(
		'logo'=>$refimgyol
	));

	if($update){
		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/genel-ayar.php?durum=ok");
	}else{
		Header("Location:../production/genel-ayar.php?durum=no");
	}

}


if(isset($_POST['admingiris'])){
	
	$kullanici_mail=$_POST['kullanici_mail'];
	$kullanici_password=md5($_POST['kullanici_password']);

	$kullaniciSor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
	$kullaniciSor->execute(array(
		'mail' => $kullanici_mail,
		'password' => $kullanici_password,
		'yetki' => 5,
	));

	echo $say=$kullaniciSor->rowCount();

	if ($say==1) {

		$_SESSION['kullanici_mail']=$kullanici_mail;
		Header("Location:../production/index.php");


	}else{
		Header("Location:../production/login.php?durum=no");
		exit;
	}

}



if(isset($_POST['genelayarkaydet'])){

	$ayarKaydet=$db->prepare("UPDATE ayar SET
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE ayar_id=0");

	$update=$ayarKaydet->execute(array(
		'ayar_title' => $_POST['ayar_title'],
		'ayar_description' => $_POST['ayar_description'],
		'ayar_keywords' => $_POST['ayar_keywords'],
		'ayar_author' => $_POST['ayar_author']
	));

	if($update){

		Header("Location:../production/genel-ayar.php?durum=ok");

	}else{
		Header("Location:../production/genel-ayar.php?durum=no");
	}

}

if(isset($_POST['iletisimayarkaydet'])){

	$ayarKaydet=$db->prepare("UPDATE ayar SET
		ayar_tel=:ayar_tel,
		ayar_gsm=:ayar_gsm,
		ayar_faks=:ayar_faks,
		ayar_mail=:ayar_mail,
		ayar_ilce=:ayar_ilce,
		ayar_il=:ayar_il,
		ayar_adres=:ayar_adres,
		ayar_mesai=:ayar_mesai
		WHERE ayar_id=0");

	$update=$ayarKaydet->execute(array(
		'ayar_tel' => $_POST['ayar_tel'],
		'ayar_gsm' => $_POST['ayar_gsm'],
		'ayar_faks' => $_POST['ayar_faks'],
		'ayar_mail' => $_POST['ayar_mail'],
		'ayar_ilce' => $_POST['ayar_ilce'],
		'ayar_il' => $_POST['ayar_il'],
		'ayar_adres' => $_POST['ayar_adres'],
		'ayar_mesai' => $_POST['ayar_mesai']
	));

	if($update){

		Header("Location:../production/iletisim-ayarlar.php?durum=ok");

	}else{
		Header("Location:../production/iletisim-ayarlar.php?durum=no");
	}

}

if(isset($_POST['apiayarkaydet'])){

	$ayarKaydet=$db->prepare("UPDATE ayar SET
		ayar_analystic=:ayar_analystic,
		ayar_maps=:ayar_maps,
		ayar_zopim=:ayar_zopim
		WHERE ayar_id=0");

	$update=$ayarKaydet->execute(array(
		'ayar_analystic' => $_POST['ayar_analystic'],
		'ayar_maps' => $_POST['ayar_maps'],
		'ayar_zopim' => $_POST['ayar_zopim']
	));

	if($update){

		Header("Location:../production/api-ayar.php?durum=ok");

	}else{
		Header("Location:../production/api-ayar.php?durum=no");
	}

}

if(isset($_POST['sosyalmedyaayarkaydet'])){

	$ayarKaydet=$db->prepare("UPDATE ayar SET
		ayar_facebook=:ayar_facebook,
		ayar_twitter=:ayar_twitter,
		ayar_google=:ayar_google,
		ayar_youtube=:ayar_youtube
		WHERE ayar_id=0");

	$update=$ayarKaydet->execute(array(
		'ayar_facebook' => $_POST['ayar_facebook'],
		'ayar_twitter' => $_POST['ayar_twitter'],
		'ayar_google' => $_POST['ayar_google'],
		'ayar_youtube' => $_POST['ayar_youtube']
	));

	if($update){

		Header("Location:../production/sosyalmedya-ayar.php?durum=ok");

	}else{
		Header("Location:../production/sosyalmedya-ayar.php?durum=no");
	}

}

if(isset($_POST['mailayarkaydet'])){

	$ayarKaydet=$db->prepare("UPDATE ayar SET
		ayar_smtphost=:ayar_smtphost,
		ayar_smtppassword=:ayar_smtppassword,
		ayar_smtpport=:ayar_smtpport,
		ayar_smtpuser=:ayar_smtpuser
		WHERE ayar_id=0");

	$update=$ayarKaydet->execute(array(
		'ayar_smtphost' => $_POST['ayar_smtphost'],
		'ayar_smtppassword' => $_POST['ayar_smtppassword'],
		'ayar_smtpport' => $_POST['ayar_smtpport'],
		'ayar_smtpuser' => $_POST['ayar_smtpuser']
	));

	if($update){

		Header("Location:../production/mail-ayar.php?durum=ok");

	}else{
		Header("Location:../production/mail-ayar.php?durum=no");
	}

}

if(isset($_POST['hakkimizdakaydet'])){
	$ayarKaydet=$db->prepare("UPDATE hakkimizda SET
		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_icerik=:hakkimizda_icerik,
		hakkimizda_video=:hakkimizda_video,
		hakkimizda_vizyon=:hakkimizda_vizyon,
		hakkimizda_misyon=:hakkimizda_misyon 
		WHERE hakkimizda_id=0");
	$update=$ayarKaydet->execute(array(
		'hakkimizda_baslik'=> $_POST['hakkimizda_baslik'],
		'hakkimizda_icerik'=> $_POST['hakkimizda_icerik'],
		'hakkimizda_video'=> $_POST['hakkimizda_video'],
		'hakkimizda_vizyon'=> $_POST['hakkimizda_vizyon'],
		'hakkimizda_misyon'=> $_POST['hakkimizda_misyon']
	));
	if($update){
		Header("Location:../production/hakkimizda.php?durum=ok");

	}else{
		Header("Location:../production/hakkimizda.php?durum=no");
	}
}



if (isset($_POST['kullanicigiris'])) {

	$kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); 
	$kullanici_password=md5($_POST['kullanici_password']); 


	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_password=:password and kullanici_durum=:durum");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'yetki' => 1,
		'password' => $kullanici_password,
		'durum' => 1
	));


	$say=$kullanicisor->rowCount();

	if ($say==1) {

		echo $_SESSION['userkullanici_mail']=$kullanici_mail;

		header("Location:../../");
		exit;
		




	} else {


		header("Location:../../?durum=basarisizgiris");

	}


}



if (isset($_POST['kullaniciduzenle'])) {

	$kullanici_id=$_POST['kullanici_id'];

	$ayarkaydet=$db->prepare("UPDATE kullanici SET
		kullanici_tc=:kullanici_tc,
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_durum=:kullanici_durum
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$ayarkaydet->execute(array(
		'kullanici_tc' => $_POST['kullanici_tc'],
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_durum' => $_POST['kullanici_durum']
	));


	if ($update) {

		Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");

	} else {

		Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
	}

}


if ($_GET['kullanicisil']=="ok") {

	$sil=$db->prepare("DELETE from kullanici where kullanici_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['kullanici_id']
	));

	
	if ($kontrol) {

		Header("Location:../production/kullanici.php?sil=ok");

	} else {

		Header("Location:../production/kullanici.php?sil=no");
	}

}


if (isset($_POST['menuduzenle'])) {

	$menu_id=$_POST['menu_id'];

	$menu_seourl=seo($_POST['menu_ad']);

	$ayarkaydet=$db->prepare("UPDATE menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		WHERE menu_id={$_POST['menu_id']}");

	$update=$ayarkaydet->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_seourl' => $menu_seourl,
		'menu_durum' => $_POST['menu_durum']
	));


	if ($update) {

		Header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=ok");

	} else {

		Header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=no");
	}

}

if ($_GET['menusil']=="ok") {

	$sil=$db->prepare("DELETE from menu where menu_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['menu_id']
	));

	
	if ($kontrol) {

		Header("Location:../production/menu.php?sil=ok");

	} else {

		Header("Location:../production/.php?sil=no");
	}

}


if (isset($_POST['menukaydet'])) {


	$menu_seourl=seo($_POST['menu_ad']);

	$ayarkaydet=$db->prepare("INSERT INTO menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum");

	$update=$ayarkaydet->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_seourl' => $menu_seourl,
		'menu_durum' => $_POST['menu_durum']
	));


	if ($update) {

		Header("Location:../production/menu.php?durum=ok");

	} else {

		Header("Location:../production/menu.php?durum=no");
	}

}


?>
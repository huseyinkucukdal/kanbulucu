<?php
$job = $_POST["job"];
try
{
	$db = new PDO("mysql:host=localhost;dbname=kanbulucu","root","root");
} 
catch(PDOException $e) 
{
	echo $e->getMessage();
}
$db->exec("SET NAMES 'UTF8'");

switch($job)
{
// ilani database'e yazdir
	case "ilankaydet":
		$adsoyad 		= stripcslashes($_POST["adsoyad"]);
		$il 			= stripcslashes($_POST["il"]);
		$ilce			= stripcslashes($_POST["ilce"]);
		$tarih          = date("d-m-Y");
		$kangrubu   	= stripcslashes($_POST["kangrubu"]);
		$eposta			= stripcslashes($_POST["eposta"]);
		$telefon		= stripcslashes($_POST["telefon"]);
		$kullanicinotu	= stripcslashes($_POST["kullanicinotu"]);

		if ($db->exec("INSERT INTO ilanlar SET adsoyad='$adsoyad', il='$il', ilce='$ilce', tarih='$tarih', kangrubu='$kangrubu', telefon='$telefon',eposta='$eposta',kullanicinotu='$kullanicinotu'")):
			echo $db->lastInsertId();
		else:
			echo 0;
		endif;

	break;
// bagisi database'e yazdir
	case "bagiskaydet":
		$adsoyad 		= stripcslashes($_POST["adsoyad"]);
		$il 			= stripcslashes($_POST["il"]);
		$ilce			= stripcslashes($_POST["ilce"]);
		$kangrubu   	= stripcslashes($_POST["kangrubu"]);
		$eposta			= stripcslashes($_POST["eposta"]);
		$telefon		= stripcslashes($_POST["telefon"]);
		$sifre  		= stripcslashes($_POST["sifre"]);
		$tgoster 		= stripcslashes($_POST["tgoster"]);

		if ($db->exec("INSERT INTO donorler SET adsoyad='$adsoyad', sehir='$il', ilce='$ilce', kangrubu='$kangrubu', telefon='$telefon',eposta='$eposta',sifre='$sifre',telefonumugoster='$tgoster'")):
			echo $db->lastInsertId();
		else:
			echo 0;
		endif;

	break;
// illere gore ilceleri database'den al
	case "ileGoreIlceleriGetir":
		$il_id = $_POST['il_id'];
		$ileGoreIlceler = array();
		
		foreach($db->query("SELECT * FROM ilceler WHERE il_id='$il_id'") as $ilce):
			$ilcebilgileri = array(
					id => $ilce['id'],
					baslik => $ilce['baslik']
				);

			$ileGoreIlceler[]=$ilcebilgileri;
		endforeach;

		echo json_encode($ileGoreIlceler);
		
	break;
// illere gore ilceleri database'den al.... arama formu
	case "ileGoreIlceleriGetirArama":
		$il_id = $_POST['il_id'];
		$ileGoreIlceler = array();
		
		foreach($db->query("SELECT * FROM ilceler WHERE il_id='$il_id'") as $ilce):
			$ilcebilgileri = array(
					id => $ilce['id'],
					baslik => $ilce['baslik']
				);

			$ileGoreIlceler[]=$ilcebilgileri;
		endforeach;

		echo json_encode($ileGoreIlceler);
		
	break;
// uygun ildeki donorleri databse'den al
	case "uygunIleGoreDonorler":
		$il_id = $_POST['il_id'];

		$ilanaGoreDonorler = array();
		foreach($db->query("SELECT * FROM donorler WHERE sehir='$il_id'") as $donor):
			$ilcebilgileri = array(
					adsoyad 	  => $donor['adsoyad'],
					ilce    	  => $donor['ilce'],
					eposta  	  => $donor['eposta'],
					telefon 	  => $donor['telefon'],
					telefongoster => $donor['telefonumugoster'],
				);

			$ilanaGoreDonorler[]=$ilcebilgileri;
		endforeach;
		echo json_encode($ilanaGoreDonorler);
		
	break;

// hizli arama yaptir
	case "hizliarama":
		$il 	  = $_POST['il'];
		$ilce     = $_POST['ilce'];
		$kangrubu = $_POST['kangrubu'];

		$ilanaGoreDonorler = array();
		foreach($db->query("SELECT * FROM donorler WHERE sehir='$il' AND kangrubu='$kangrubu' AND ilce='$ilce'") as $donor):
			$donorbilgileri = array(
					adsoyad  => $donor['adsoyad'],
					sehir 	 => $donor['sehir'],
					ilce     => $donor['ilce'],
					kangrubu => $donor['kangrubu'],
					telefongoster => $donor['telefonumugoster'],
					telefon => $donor['telefon']
				);

			$ilanaGoreDonorler[]=$donorbilgileri;
		endforeach;
		echo json_encode($ilanaGoreDonorler);	
	break;
// login form
	case "login":
		$eposta   = stripcslashes($_POST['eposta']);
		$sifre    = stripcslashes($_POST['sifre']);
		$donor  = $db ->query("SELECT * FROM donorler WHERE eposta='$eposta' AND sifre='$sifre'")->fetch();
		$donorInfo = array(
				adsoyad => $donor[adsoyad]
			);
			echo json_encode($donorInfo);
	break;




} // switch ends here






	











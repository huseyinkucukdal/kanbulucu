<?php session_start(); ob_start(); ?>
<!DOCTYPE html>
<html lang="tr_TR">
	<head>
		<?php include("partials/common/header.php"); ?>
		<?php include("assets/server/functions.php"); ?>
	</head>
	<body>
		<div class="container">
			<div class="row"><div class="col-sm-12">&nbsp;</div></div>
			<div class="row">
				<div class="col-sm-12">
					<a href="?page=home">
						<img src="assets/images/logo.svg" width="200" />
						<a href="?page=common&subpage=login" style="float:right;"><h4>login</h4></a>
					</a>
				</div>
			</div>
			<div class="row"><div class="col-sm-12">&nbsp;</div></div>
		</div>
		<?php
			try
			{
				$db = new PDO("mysql:host=localhost;dbname=kanbulucu","root","root");
			} 
			catch(PDOException $e) 
			{
				echo $e->getMessage();
			}
			$db->exec("SET NAMES 'UTF8'");

			// if ($db->exec("INSERT INTO donorler SET adsoyad='Mustafa Onur Çelik', eposta='onurcelik@me.com'")):
			// 	echo $db->lastInsertId() . "basarili";
			// else:
			// 	echo "Hata : " . $db->errorInfo()[2];
			// endif;
		?>
		<div class="container">
			<?php include("partials/".$page."/".$subpage.".php"); ?>
			<?php include("partials/common/footer.php"); ?>
		</div>
	</body>
</html>
<?php
    $donorid = $_GET[profilid];
    $donor = $db->query("SELECT * FROM donorler WHERE id='$donorid'")->fetch();
?>


<br />
<!-- ilan bilgileri -->
<h2>PROFİL BİLGİLERİ</h2>
<br />
<table class="table table-bordered">
    <tr>
        <td>Ad Soyad</td>
        <td><?php echo $donor[adsoyad]; ?></td>
    </tr>
    <tr>
        <td>Kan Grubu</td>
        <td><?php slugToName($db, $donor[kangrubu]); ?></td>
    </tr>
    <tr>
        <td>İl</td>
        <td><?php exchangeValues($db, 'iller', $donor[sehir], 'baslik'); ?></td>
    </tr>
        <tr>
        <td>İlce</td>
        <td><?php exchangeValues($db, 'ilceler', $donor[ilce], 'baslik'); ?></td>
    </tr>
        <tr>
        <td>Telefon</td>
        <td><?php echo $donor[telefon]; ?></td>
    </tr>
    </tr>
        <tr>
        <td>Eposta</td>
        <td><?php echo $donor[eposta]; ?></td>
    </tr>
</table>
<br />
<div>
    <a href="?page=kan-bagisla&subpage=donor-update&profilid=60">Profilimi düzenle</a>        
</div>

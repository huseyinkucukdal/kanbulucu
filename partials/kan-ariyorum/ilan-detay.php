<?php
    $ilanid = $_GET[ilanid];
    $ilan = $db->query("SELECT * FROM ilanlar WHERE id='$ilanid'")->fetch();
?>

<br />
<!-- ilan bilgileri -->
<h2>İLAN BİLGİLERİ</h2>
<br />
<table class="table table-bordered">
    <tr>
        <td>Ad Soyad</td>
        <td><?php echo $ilan[adsoyad]; ?></td>
    </tr>
    <tr>
        <td>Kan Grubu</td>
        <td><?php slugToName($db, $ilan[kangrubu]); ?></td>
    </tr>
    <tr>
        <td>İl</td>
        <td><?php exchangeValues($db, 'iller', $ilan[il], 'baslik'); ?></td>
    </tr>
        <tr>
        <td>İlce</td>
        <td><?php exchangeValues($db, 'ilceler', $ilan[ilce], 'baslik'); ?></td>
    </tr>
        <tr> 
        <td>Tarih</td>
        <td><?php echo $ilan[tarih]; ?></td>
    </tr>
    </tr>
        <tr>
        <td>Telefon</td>
        <td><?php echo $ilan[telefon]; ?></td>
    </tr>
    </tr>
        <tr>
        <td>Eposta</td>
        <td><?php echo $ilan[eposta]; ?></td>
    </tr>
    </tr>
        <tr>
        <td>Not</td>
        <td><?php echo $ilan[kullanicinotu]; ?></td>
    </tr>
</table>
<!-- ilana uygun ilanlar -->
<hr>
<h2><strong><?php exchangeValues($db, 'iller', $ilan[il], 'baslik'); ?></strong> ilindeki <strong><?php slugToName($db, $ilan[kangrubu]); ?></strong> donörler</h2>
<br />























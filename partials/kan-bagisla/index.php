<div class="row">
  <div class="col-sm-12">
    <div class="row">
      <div class="col-sm-6">
        <!-- ad soyad yaz -->
        <strong>Adınız Soyadınız :</strong>
        <br />
        <input type="text" name="" id="adsoyad" class="form-control">      
      </div>
      <div class="col-sm-6">
        <!-- kan grubu sec -->
         <strong>Kan Grubu :</strong>
         <select name="kangrubu" id="kangrubu" class="form-control">
             <?php kangruplari($db); ?> <!-- functions.php tarafindan dolduruluyor -->
         </select>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
         <strong>Şehir :</strong>
         <select name="sehir" id="iller" onchange="ileGoreIlceleriGetir('ilceler','iller')" class="form-control">
             <?php iller($db); ?> <!-- functions.php tarafindan dolduruluyor -->
         </select>
         <br>
      </div>
      <div class="col-sm-6">
        <strong>İlçe :</strong>
        <select name="ilce" id="ilceler" class="form-control">
            <!-- buranin ici js tarafindan dolduruluyor -->
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <strong>Telefon :</strong>
        <br />
        <input type="text" name="" id="telefon" class="form-control">  
      </div>
      <div class="col-sm-6">
         <strong>Email :</strong>
         <br />
         <input type="text" name="" id="eposta" class="form-control">    
      </div>
    <div class="row">
      <div class="col-sm-12">
        <strong>Tel Numaramı Göster :</strong>
        <input type="checkbox" name="" id="telefonugoster" checked>
        <br /><br />
      </div>
    </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <strong>Şifre :</strong>
        <input type="password" name="" id="sifre" class="form-control">
      </div>
      <div class="col-sm-6">
        <strong>Şifre Tekrar:</strong>
        <input type="password" name="" id="sifreTekrar" class="form-control">
      </div>
    </div>
  </div>
</div>
   <hr>
   <button class="btn btn-danger btn-block" onclick="kan_bagisla.ilan.save()">Kan Bağışla</button>





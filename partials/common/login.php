<br><br>
<div class="row">
    <?php if ($_POST): ?>
        <div class="col-sm-12">
        
        </div>
    <?php endif; ?>
	<div class="col-sm-4 col-sm-offset-4">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">Lütfen giriş yapınız</h4>
            </div>
            <div class="panel-body">
                <input type="text" name="email" placeholder="Email" class="form-control" id="login_email">
                <input type="password" name="password" placeholder="Şifre" class="form-control" id="login_sifre">
                <br>
                <button type="submit" class="btn btn-success" onclick="login_form.login()">Giriş</button>
            </div>
        </div>
	</div>
</div>
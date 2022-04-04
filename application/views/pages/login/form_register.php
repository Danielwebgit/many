<p class="login-box-msg">Registro de Usuários</p>

<form action="<?php echo base_url('login/save') ?>" method="post">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Nome" name="name">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Data de Nascimento" name="birth_data">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Senha" name="password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Repetir Senha" name="password2">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                    concordo com <a href="#">termos</a>
                </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
        </div>
        <!-- /.col -->
    </div>
</form>

<?php
echo '<hr>';
echo anchor('password', 'Esqueci Minha Senha');
echo '<\ br>';
echo anchor('login', 'Voltar para tela de login.');
?>
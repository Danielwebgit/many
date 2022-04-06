<p class="login-box-msg">Registro de Usuários</p>

<form action="<?php echo base_url('account/store') ?>" method="post">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Nome" name="nome">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
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
echo '<br>';
echo anchor('login', 'Voltar para tela de login.');
?>
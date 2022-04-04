<p class="login-box-msg">E-mail para recuperar senha...</p>

<form action="" method="post">
    <div class="input-group mb-3">
        <input type="email" class="form-control" placeholder="Email">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
        </div>
        <!-- /.col -->
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
        </div>
        <!-- /.col -->
    </div>
</form>

<?php
echo anchor('login', 'Voltar para tela de login.');
?>
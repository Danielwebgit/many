<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Adicionando Fornecedor:</h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <?php
                    if(isset($provider))
                    { ?>
                        <form action="<?php echo base_url()?>update/<?= $provider['fornecedor_id']?>" method="POST">
                            <?php
                    }
                    else
                    { ?>
                        <form action="<?php echo base_url('store')?>" method="POST">
                        <?php } ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome ou Razão Social:</label>
                            <input type="text" class="form-control" name="razao_social" value="<?= isset($provider) ? print_r($provider['razao_social']): ''?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Endereço:</label>
                            <input type="text" class="form-control" name="endereco" value="<?= isset($provider) ? print_r($provider['endereco']): ''?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bairro:</label>
                            <input type="text" class="form-control" name="bairro" value="<?= isset($provider) ? print_r($provider['bairro']): ''?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Fone: </label>
                            <input type="text" class="form-control" name="fone" value="<?= isset($provider) ? print_r($provider['fone']): ''?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email:</label>
                            <input type="text" class="form-control" name="email" value="<?= isset($provider) ? print_r($provider['email']): ''?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">CNPJ/MF ou CPF:</label>
                            <input type="text" class="form-control" name="cnpj_cpf" value="<?= isset($provider) ? print_r($provider['cnpj_cpf']): ''?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Inscr. Estadual:</label>
                            <input type="text" class="form-control" name="inscr_stadual" value="<?= isset($provider) ? print_r($provider['inscr_stadual']): ''?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Inscr. Municipal:</label>
                            <input type="text" class="form-control" name="inscr_municipal" value="<?= isset($provider) ? print_r($provider['inscr_municipal']): ''?>">
                        </div>
                        <button type="submit" class="btn btn-default float-right">Adicionar</button>
                    </div>
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
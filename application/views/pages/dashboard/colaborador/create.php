<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <?php
                    if(isset($produtos))
                    { ?>
                        <form action="<?php echo base_url()?>update/<?= $produtos['produto_id']?>" method="POST">
                            <?php
                    }
                    else
                    { ?>
                        <form action="<?php echo base_url('store')?>" method="POST">
                        <?php } ?>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title?>:</h1>
                </div><!-- /.col -->
               
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome:</label>
                            <input type="text" class="form-control" name="nome" value="<?= isset($produtos) ? $produtos['nome']: ''?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Função:</label>
                            <input type="text" class="form-control" name="funcao" value="<?= isset($produtos) ? $produtos['descricao']: ''?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cargo:</label>
                            <input type="text" class="form-control" name="cargo" value="<?= isset($produtos) ? $produtos['descricao']: ''?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status:</label>
                            <input type="text" class="form-control" name="status" value="<?= isset($produtos) ? $produtos['descricao']: ''?>">
                        </div>
                        
                    </div>
                </div>
                <!-- /.col endereco-->
            </div>
            <div class="col-sm-6">
                    <h1 class="m-0">Endereço:</h1>
                </div> 
                <input type="hidden" name="qnt_campo" id="qnt_campo">
                <div id="form_endereco">
                <div class="row mb-2 endereco">    
                <div class="col-sm-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">CEP:</label>
                            <input type="text" class="form-control" name="cep" value="<?= isset($produtos) ? $produtos['nome']: ''?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Número:</label>
                            <input type="text" class="form-control" name="numero" value="<?= isset($produtos) ? $produtos['nome']: ''?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bairro:</label>
                            <input type="text" class="form-control" name="bairro" value="<?= isset($produtos) ? $produtos['nome']: ''?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cidade:</label>
                            <input type="text" class="form-control" name="cidade" value="<?= isset($produtos) ? $produtos['nome']: ''?>">
                        </div>   
                    </div>
                </div>
                </div>
                
                </div>
                <div class="row mb-2">
                    <div class="col-sm-12">
                    <div class="card-body">
                        
                    <button type="button" onclick="adicionarCampo()" class="btn btn-default float-right">+</button>  
                        <button type="submit" class="btn btn-default float-right">Enviar</button>
                    </div>
                    </div>
                    </div>
                </div>
                <!-- /.col endereco -->
            <!-- /.row -->
            </form>
        </div><!-- /.container-fluid -->
    </div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title?>:</h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <?php
                    if(isset($produtos))
                    { ?>
                        <form action="<?php echo base_url()?>update/<?= $produtos['produto_id']?>" method="POST">
                            <?php
                    }
                    else
                    { ?>
                        <form action="<?php echo base_url('produto/store')?>" method="POST">
                        <?php } ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome:</label>
                            <input type="text" class="form-control" name="nome" value="<?= isset($produtos) ? $produtos['nome']: ''?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Descrição:</label>
                            <input type="text" class="form-control" name="descricao" value="<?= isset($produtos) ? $produtos['descricao']: ''?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Quantidade:</label>
                            <input type="text" class="form-control" name="quantidade" value="<?= isset($produtos) ? $produtos['quantidade']: ''?>">
                        </div>
                        <button type="submit" class="btn btn-default float-right">Adicionar</button>
                    </div>
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
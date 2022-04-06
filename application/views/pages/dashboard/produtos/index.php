<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?>:</h1>
                    <a href="<?= base_url('produto/create') ?>" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> Adicionar
                    </a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Detalhes dos <?= $title ?>:</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição:</th>
                            <th>Quantidade</th>
                            <th>status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($produtos as $item) {?>
                        <tr>
                            <td><?=  $item['nome'] ?></td>
                            <td><?= $item['descricao'] ?></td>
                            <td><?= $item['quantidade'] ?></td>
                            <td><?= ($item['status'] == 1) ? '<td><span class="badge badge-success">Ativado</span></td>' : '<td><span class="badge badge-warning">Desativado</span></td>'; ?></td>
                            <td class="text-right py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?= base_url()?>produto/edit/<?= $item['produto_id'] ?>" class="btn btn-info"><i class="fas fa-pencil-alt mr-1"></i></a>
                                    <a href="<?= base_url()?>produto/update/<?= $item['produto_id'] ?>" class="btn btn-orange"><i class="fas fa-solid fa-eye"></i></a>
                                    <a href="<?= base_url()?>produto/delete/<?= $item['produto_id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
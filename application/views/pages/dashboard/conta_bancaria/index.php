<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Conta bancaria:</h1>
                    <a href="<?= base_url('create') ?>" class="btn btn-sm btn-primary">
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
                    <h3 class="card-title">Detalhes da conta bancaria</h3>

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
                            <th>Razão Social:</th>
                            <th>CNPJ OU CPF:</th>
                            <th>Conta:</th>
                            <th>Saldo:</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($providers as $item) {?>
                        <tr>
                            <td><?=  $item['razao_social'] ?></td>
                            <td><?= $item['cnpj_cpf'] ?></td>
                            <td><?= $item['numero_conta'] ?></td>
                            <td><?= $item['saldo']?></td>
                            <td class="text-right py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?= base_url()?>edit/<?= $item['conta_bancaria_id'] ?>" class="btn btn-info"><i class="fas fa-pencil-alt mr-1"></i></a>
                                    <a href="<?= base_url()?>delete/<?= $item['conta_bancaria_id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
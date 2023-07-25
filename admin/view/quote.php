<?php require_once 'blocks/header.php'?>

<?php require_once 'blocks/navbar.php'?>

<?php require_once 'blocks/sidebar.php'?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin Panelga xush kelibsiz</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Asosiy</a></li>
                        <li class="breadcrumb-item">Quotelar</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?php if(!empty($_SESSION['success'])):?>
                <div class="alert greenAlert alert-success"><?=$_SESSION['success'] ?></div>
            <?php endif; ?>
            <?php if(!empty($_SESSION['error'])):?>
                <div class="alert alert-danger"><?=$_SESSION['error'] ?></div>
            <?php endif; ?>
            <div class="card">
                <div class="card-body">
                    <a href="?controller=quote_add" class="btn btn-success mb-3"><i class="far fa-plus-square"></i> Yangi quote qo'shish</a>
                    <table class="bg-light  table  table-bordered">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Author</th>
                            <th>Quote</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($quotes)): ?>
                            <?php $i=1; foreach ($quotes as $quote): ?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$quote['author']?></td>
                                    <td><?=$quote['title']?></td>
                                    <td><?=$quote['status']?></td>
                                    <td class="d-flex">
                                        <a href="?controller=quote_edit&id=<?=$quote['id']?>" class="btn btn-primary mx-1 d-flex align-items-center p-2">
                                            <i class="fas fa-edit"></i>
                                            Tahrirlash
                                        </a>
                                        <a  href="?controller=quote_delete&id=<?=$quote['id']?>" class="del btn btn-danger mx-1 d-flex align-items-center p-2">
                                            <i class="fas fa-trash"></i>
                                            O'chirish
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>

</script>

<?php require_once 'blocks/footer.php'?>

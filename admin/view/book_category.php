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
                            <li class="breadcrumb-item">Kitoblar Categoriyalari</li>
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
                        <a href="?controller=news_category_add" class="btn btn-success mb-3"><i class="far fa-plus-square"></i> Kitob Categoriyasi qo'shish</a>
                        <table class="table table-bordered bg-light">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>ID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($categories)): ?>
                                <?php $i=0 ?>
                                <?php foreach ($categories as $category): ?>
                                    <?php $i++ ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$category['title']?></td>
                                        <td><?=$category['status']?></td>
                                        <td><?=$category['id']?></td>
                                        <td class="d-flex">
                                            <a href="?controller=news_category_edit&id=<?=$category['id']?>" class="btn btn-primary mx-1 p-2">
                                                <i class="fas fa-edit"></i>
                                                Tahrirlash
                                            </a>
                                            <a  href="?controller=news_category_delete&id=<?=$category['id']?>" class="del btn btn-danger mx-1 p-2">
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

<?php require_once 'blocks/footer.php'?>
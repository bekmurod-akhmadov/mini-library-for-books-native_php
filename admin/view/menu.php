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
                            <li class="breadcrumb-item">Menyular</li>
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
                       <a href="?controller=menu_add" class="btn btn-success mb-3"><i class="far fa-plus-square"></i> Yangi menu qo'shish</a>
                       <table class="table table-bordered bg-light">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Title</th>
                                    <th>Link</th>
                                    <th>Parent</th>
                                    <th>Order By</th>
                                    <th>ID</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($menus)): ?>
                                    <?php $i=0 ?>
                                    <?php foreach ($menus as $menu): ?>
                                        <?php $i++ ?>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$menu['title']?></td>
                                            <td><?=$menu['link']?></td>
                                            <td><?=$menu['parent']?></td>
                                            <td><?=$menu['order_by']?></td>
                                            <td><?=$menu['id']?></td>
                                            <td class="d-flex">
                                                <a href="?controller=menu_edit&id=<?=$menu['id']?>" class="btn btn-primary mx-1 p-2">
                                                    <i class="fas fa-edit"></i>
                                                    Tahrirlash
                                                </a>
                                                <a  href="?controller=menu_delete&id=<?=$menu['id']?>" class="del btn btn-danger mx-1 p-2">
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
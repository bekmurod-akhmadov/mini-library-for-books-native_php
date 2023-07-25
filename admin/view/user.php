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
                        <li class="breadcrumb-item">Foydalanuvchilar</li>
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
                    <a href="?controller=user_add" class="btn btn-success mb-3"><i class="far fa-plus-square"></i> Foydalanuvchi qo'shish</a>
                    <table class="table table-bordered bg-light">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Login</th>
                            <th>Email</th>
                            <th>Avatar</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($getAllUsers)): ?>

                            <?php $i=0 ?>
                            <?php foreach ($getAllUsers as $user): ?>

                                <?php $i++;
                                    $image = getImage($user['id'],'user',$user['avatar']);
                                ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$user['login']?></td>
                                    <td><?=$user['email']?></td>
                                    <td><img src="<?=$image?>" style="max-width:150px;" alt="user_avatar"></td>
                                    <td class="d-flex">
                                        <a href="?controller=user_edit&id=<?=$user['id']?>" class="btn btn-primary mx-1 p-2">
                                            <i class="fas fa-edit"></i>
                                            Tahrirlash
                                        </a>
                                        <a  href="?controller=user_delete&id=<?=$user['id']?>" class="del btn btn-danger mx-1 p-2">
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

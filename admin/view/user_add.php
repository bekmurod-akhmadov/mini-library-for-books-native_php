<?php require_once 'blocks/header.php'?>

<?php require_once 'blocks/navbar.php'?>

<?php require_once 'blocks/sidebar.php'?>
<?php
$userAvatar = UPLOADS . '/no-image.png';

if (!empty($userItem['avatar'])){
    $userAvatar = getImage($userItem['id'],'user',$userItem['avatar']);
}
?>

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
                            <li class="breadcrumb-item"><a href="/admin?controller=news">Foydalanuvchilar</a></li>
                            <?php if(!empty($userItem)): ?>
                                <li class="breadcrumb-item">Foydalanuvchi ma'lumotlarini tahrirlash</li>
                            <?php else: ?>
                                <li class="breadcrumb-item">Foydalanuvchi qo'shish</li>
                            <?php endif; ?>

                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="?controller=<?=$controller?><?=($controller == 'user_edit') ? "&id=" . $userItem['id'] : '' ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 mb-3">
                                            <label for="login">Login: </label>
                                            <input value="<?=(!empty($userItem) ? $userItem['login'] : '')?>" required type="text" name="login" class="form-control" id="login">
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <label for="email">Email: </label>
                                            <input value="<?=(!empty($userItem) ? $userItem['email'] : '')?>" required type="email" name="email" class="form-control" id="email">
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <label for="password">Password: </label>
                                            <input  type="password" name="password" class="form-control" id="password">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-lg-12 mb-3 upload_image">
                                        <label for="image">Avatar

                                            <img src="<?=$userAvatar?>" style="max-width: 100%;cursor: pointer;" alt="">
                                            <span class="badge badge-primary">Avatarni yuklash uchun bosing</span>
                                        </label>
                                        <input style="display: none;" type="file" name="avatar" id="image" class="upload">
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="status" class="w-100">Status</label>
                                        <div>
                                            <input class="form-check-input" id="status" name="status-news"  type="checkbox" <?=($userItem['status'] == 1 ? "checked" : 'off')?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-success btn-lg"><?=($_GET['controller'] == 'user_edit') ? "Saqlash" : "Qo'shish" ?></button>
                            <a href="?controller=user" class="btn btn-danger btn-lg mx-2 backButton">Orqaga qaytish</a>

                        </div>
                    </div>
                </form>

            </div>

    </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php require_once 'blocks/footer.php'?>
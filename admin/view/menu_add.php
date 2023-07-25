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
                            <li class="breadcrumb-item"><a href="/admin?controller=menu">Menyular</a></li>
                            <?php if(!empty($menuData)): ?>
                                <li class="breadcrumb-item">Menyuni tahrirlash</li>
                            <?php else: ?>
                                <li class="breadcrumb-item">Menyu qo'shish</li>
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

                <form action="?controller=<?=$controller?><?=($controller == 'menu_edit') ? "&id=" . $menuData['id'] : '' ?>" method="post">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body">
                                   <div class="row">
                                       <div class="col-lg-12 mb-3">
                                           <label for="title">Title: </label>
                                           <input value="<?=!empty($menuData) ? $menuData['title'] : ''?>" required type="text" name="title" class="form-control" id="title">
                                       </div>
                                       <div class="col-lg-12">
                                           <label for="link">Link: </label>
                                           <input value="<?=!empty($menuData) ? $menuData['link'] : ''?>" required type="text" name="link" class="form-control" id="link">
                                       </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-lg-12 mb-3">
                                        <label for="position">Position: </label>
                                        <select name="position" id="position" class="form-control">
                                            <?php if(!empty($menuPositions)): ?>
                                                <?php foreach ($menuPositions as $key => $position): ?>
                                                    <option value="<?=$key?>" <?=($key == $menuData['position']) ? 'selected' : '' ?> ><?=$position?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="order_by">Order By: </label>
                                        <input value="<?=!empty($menuData) ? $menuData['order_by'] : ''?>" required type="text" name="order_by" class="form-control" id="order_by">
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="parent">Parent: </label>
<!--                                        <input required type="text" name="parent" class="form-control" id="parent">-->
                                        <select name="parent" id="parent" class="form-control">
                                            <option value="0">Null</option>
                                            <?php if(!empty($parents)): ?>
                                                <?php foreach ($parents as $parent): ?>
                                                <?php debug($parents); ?>
                                                    <option value="<?=$parent['id']?>" <?= ($parent['id'] == $menuData['parent']) ? 'selected' : '' ?> ><?=$parent['title']?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="status">Status: </label>
                                        <input value="<?=!empty($menuData) ? $menuData['status'] : ''?>"  required type="text" name="status" class="form-control" id="status">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-success btn-lg"><?=($_GET['controller'] == 'menu_edit') ? "Saqlash" : "Qo'shish" ?></button>
                            <a href="?controller=menu" class="btn btn-danger btn-lg mx-2 backButton">Orqaga qaytish</a>

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
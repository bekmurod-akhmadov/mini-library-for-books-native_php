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
                        <li class="breadcrumb-item"><a href="?controller=social_links">Ijtimoiy tarmoqlar</a></li>

                        <?php if(!empty($updateLink)): ?>
                            <li class="breadcrumb-item">Ijtimoiy Tarmoqni tahrirlash</li>
                        <?php else: ?>
                            <li class="breadcrumb-item">Ijtimoiy Tarmoq qo'shish</li>
                        <?php  endif; ?>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="?controller=<?=$controller?><?=($_GET['controller'] == 'social_edit') ? "&id=" . $updateLink['id'] : '' ?>"  method="post">

                <div class="row">
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <label for="link">Link</label>
                                <input value="<?=(!empty($updateLink)) ? $updateLink['link'] : '' ?>" type="text" class="form-control mb-3" name="link" id="link" required>

                                <label for="class">Class</label>
                                <input value="<?=(!empty($updateLink)) ? $updateLink['class'] : '' ?>" type="text" class="form-control" name="class" id="class" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <label for="status">Status</label>
                                <input value="<?=(!empty($updateLink)) ? $updateLink['status'] : '' ?>" type="text" name="status" id="status" class="form-control mb-3" required>

                                <label for="order_by">Order By</label>
                                <input value="<?=(!empty($updateLink)) ? $updateLink['order_by'] : '' ?>" type="text" name="order_by" id="order_by" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <button class="btn btn-success btn-lg"><?=($_GET['controller'] == 'social_edit' ? "Tahrirlash" : "Qo'shish" )?></button>
                        <a href="?controller=social_links" class="btn btn-danger btn-lg mx-2 backButton">Orqaga qaytish</a>
                    </div>

                </div>

            </form>

        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php require_once 'blocks/footer.php'?>

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
                        <li class="breadcrumb-item"><a href="?controller=news_category">Yangilik Categoriyalari</a></li>
                        <?php if($_GET['controller'] == 'news_category_edit'): ?>
                            <li class="breadcrumb-item">Yangilik Categoriyasini tahrirlash</li>
                        <?php else: ?>
                            <li class="breadcrumb-item">Yangilik Categoriyasini qo'shish</li>
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
            <form action="?controller=<?=$controller?><?=($controller == 'news_category_edit') ? "&id=" . $updatecategoryItem['id'] : '' ?>"  method="post">

                <div class="row">
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <label for="title" class="w-100">
                                    Titile
                                    <input value="<?=(!empty($updatecategoryItem) ? $updatecategoryItem['title'] : '')?>" required type="text" name="title" id="title" class="form-control">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <label for="status" class="w-100">Status</label>
                                <div>
                                    <input class="form-check-input" id="status" name="status-news"  type="checkbox" <?=$_GET['controller'] == 'news_category_add'? 'checked' : 'off'?> <?=($updatecategoryItem['status']==1 ? 'checked' : 'off')?> >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-success btn-lg"><?=($_GET['controller']=='news_category_edit'? "Saqlash" : "Qo'shish" )?></button>
                        <a href="?controller=news_category" class="btn btn-danger btn-lg mx-2 backButton">Orqaga qaytish</a>

                    </div>
                </div>

            </form>

        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php require_once 'blocks/footer.php'?>

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
                        <li class="breadcrumb-item"><a href="?controller=quote">Quote</a></li>
                        <?php if($_GET['controller'] == 'quote_edit'): ?>
                            <li class="breadcrumb-item">Quoteni tahrirlash</li>
                        <?php else: ?>
                            <li class="breadcrumb-item">Quote qo'shish</li>
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
<!--                --><?php //debug($quoteItem); ?>
            <form action="?controller=<?=$controller?><?=($controller == 'quote_edit') ? "&id=" . $quoteItem['id'] : '' ?>" method="post">

                <div class="row">
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-body">
                               <div class="row">
                                    <div class="col-lg-10">
                                        <label for="name" class="w-100">
                                            Author
                                            <input value="<?=(!empty($quoteItem['author']) ? $quoteItem['author'] : '' )?>" required type="text" name="name" id="name" class="form-control">
                                        </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="status">
                                            Status
                                            <input value="<?=(!empty($quoteItem['status']) ? $quoteItem['status'] : '' )?>" required type="text" class="form-control" name="status" id="status">
                                        </label>
                                    </div>
                                   <label for="quote" class="w-100">
                                       Quote
                                       <div class="col-lg-12">
                                           <textarea required name="quote" class="form-control" id="quote" cols="30" rows="10">
                                              <?=(!empty($quoteItem['title']) ? $quoteItem['title'] : '' )?>
                                           </textarea>
                                       </div>

                                   </label>

                               </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-success btn-lg"><?=($_GET['controller']=='quote_edit'? "Saqlash" : "Qo'shish" )?></button>
                        <a href="?controller=quote" class="btn btn-danger btn-lg mx-2 backButton">Orqaga qaytish</a>

                    </div>
                </div>

            </form>

        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php require_once 'blocks/footer.php'?>

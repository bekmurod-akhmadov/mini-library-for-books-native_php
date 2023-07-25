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
                        <li class="breadcrumb-item">404 sahifa topilmadi!</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class=" alert my-5 text-center alert-warning">
                            <h2 style="font-size: 40px;">404 EROR</h2>
                            <?php if(!empty($_SESSION['error'])): ?>
                                <h4><?=$_SESSION['error']?></h4>
                            <?php else: ?>
                                <h4>Sahifa Topilmadi!</h4>
                            <?php endif; ?>
                        </div>
                        <img  src="<?=ASSETS?>/images/404.png" style=" margin-bottom: 30px; width:100%; height:400px;object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php require_once 'blocks/footer.php'?>

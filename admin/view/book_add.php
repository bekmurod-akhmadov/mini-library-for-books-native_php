<?php require_once 'blocks/header.php'?>

<?php require_once 'blocks/navbar.php'?>

<?php require_once 'blocks/sidebar.php'?>
<?php
$newsImage = UPLOADS . '/no-image.png';
if (!empty($newsItem['image'])){
    $newsImage = getImage($newsItem['id'],'news',$newsItem['image']);
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
                            <li class="breadcrumb-item"><a href="/admin?controller=book">Kitoblar</a></li>
                            <?php if(!empty($newsItem)): ?>
                                <li class="breadcrumb-item">Kitobni tahrirlash</li>
                            <?php else: ?>
                                <li class="breadcrumb-item">Kitob qo'shish</li>
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
                <form action="?controller=<?=$controller?><?=($controller == 'book_edit') ? "&id=" . $newsItem['id'] : '' ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 mb-3">
                                            <label for="title">Kitob Nomi: </label>
                                            <input value="<?=(!empty($newsItem) ? $newsItem['title'] : '')?>" required type="text" name="title" class="form-control" id="title">
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label for="description">Kitob Muallifi: </label>
                                            <input value="<?=(!empty($newsItem) ? $newsItem['description'] : '')?>"  required type="text" name="description" class="form-control" id="description">
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label for="created_date">Saytga qo'shilgan vaqti: </label>
                                            <input value="<?=(!empty($newsItem) ? date('Y-m-d',strtotime($newsItem['created_date'])) .'T'.date('H:i',strtotime($newsItem['created_date']))  : '')?>"  required type="datetime-local" name="created_date" class="form-control" id="created_date">
                                        </div>

                                        <div class="col-lg-12 mb-3 text-dark">
                                            <style>
                                                .ck.ck-editor {
                                                    height: 350px !important;
                                                    overflow: scroll;
                                                }
                                            </style>
                                            <label for="body" class="text-light">Kitob haqida qisqacha: </label>
                                            <textarea style="resize: none;" name="body" id="body" cols="30" rows="10" class="form-control">
                                               <?=(!empty($newsItem) ? $newsItem['body'] : '')?>"
                                            </textarea>
                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-lg-12 mb-3 upload_image">
                                        <label for="image">Image

                                            <img src="<?=$newsImage?>" style="max-width: 100%;cursor: pointer;" alt="">
                                            <span class="badge badge-primary">Rasmni yuklash uchun bosing</span>
                                        </label>
                                        <input style="display: none;" type="file" name="image" id="image" class="upload">
                                    </div>
                                    
                                    <div class="col-lg-12 mb-3 upload_image">
                                        <label for="">Kitobni Yuklash</label>
                                        <input type="file" name="files">
                                    </div>
                                    
                                    <div class="col-lg-12 mb-3">
                                        <label for="category_id">Category: </label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <?php if(!empty($getAllCategories)): ?>
                                                <?php foreach ($getAllCategories as $key => $category): ?>
                                                    <option <?=($category['id'] == $newsItem['category_id'] ? 'selected':'')?> value="<?=$category['id']?>"><?=$category['title']?><?=$position?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="seen_count">yuklanganlar Soni: </label>
                                        <input value="<?=(!empty($newsItem['seen_count']) ? $newsItem['seen_count'] : '')?>" required type="text" name="seen_count" class="form-control" id="seen_count">
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="status" class="w-100">Status</label>
                                        <div>
                                            <input class="form-check-input" id="status" name="status-news"  type="checkbox" <?=($newsItem['status'] == 1 ? "checked" : '')?>>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 ">
                                        <label for="actual" class="w-100">Actual</label>
                                        <div>
                                            <input class="form-check-input" id="actual" name="actual"  type="checkbox" <?=($newsItem['actual'] == 1 ? 'checked' : '')?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-success btn-lg"><?=($_GET['controller'] == 'book_edit') ? "Saqlash" : "Qo'shish" ?></button>
                            <a href="?controller=book" class="btn btn-danger btn-lg mx-2 backButton">Orqaga qaytish</a>

                        </div>
                    </div>
                </form>

            </div>

    </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        ClassicEditor
            .create( document.querySelector( '#body') )
            .catch( error => {
                console.error( error );
            } );
    </script>

<?php require_once 'blocks/footer.php'?>
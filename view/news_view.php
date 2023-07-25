<?php require_once 'view/blocks/header.php'?>
<div class="container">
    <div class="wrapper">

        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Asosiy</a></li>
                    <li class="breadcrumb-item"><a href="?controller=news_category&id=<?=$categoryName['id']?>"><?=$categoryName['title']?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?=$model['title']?></li>
                </ol>
            </nav>
        </div>
         <main class="main news_view">
            <div class="main__content">
                <div class="news_header">
                     <span class="news-attributes__date">
                                    <i class="far fa-calendar" style="margin-right: 5px;"></i>
                                     <?= date("H:i | d.m.Y",strtotime($model['created_date']))?>
                                  </span>
                    <span class="news-attributes__views"><i class="fas fa-eye">&nbsp</i><?=$model['seen_count']?></span>
                </div>
                <div class="news">
                    <div class="row">
                        
                        <div class="col-lg-6">
                            <?php $image = getImage($model['id'],'news',$model['image']);
                                $pdfFile = getFiles($model['id'],'files',$model['files']);
                            ?>
                            <img style="max-width: 300px;" src="<?=$image?>" alt="image">
                        </div>
                        <div class="col-lg-6">
                            <div class="book_title"><span>Nomi </span>: <?=$model['title']?></div>
                            <div class="book_name"><span>Muallif </span>: <?=$model['description']?></div>
                            <div class="book_body"><span>Kitob haqida qisqacha:</span><?=$model['body']?></div>

                        </div>
                        <div class="col-lg-12 text-center mt-3">
                                <a href="<?=$pdfFile?>" download="" class="btn btn-success btn-lg ">Yuklab olish <i class="fas fa-download"></i></a>
                        </div>

                    </div>
                </div>
            </div>
            <?php require_once 'blocks/sidebar.php'?>

        </main>

    </div>
</div>

<?php require_once 'view/blocks/footer.php'?>

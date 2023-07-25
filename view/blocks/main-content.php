<div class="main__content">
    <div class="news">
        <div class="news__list">

            <?php if(!empty($allNews)): ?>

                <?php foreach ($allNews as $newsItem): ?>

                    <?php $getCategoryName = getCategoryName($newsItem['category_id']) ?>
                    <?php $image = getImage($newsItem['id'],'news',$newsItem['image']) ?>
                    <?php $pdfFile = getFiles($newsItem['id'],'files',$newsItem['files']); ?>

                    <div class="news__item">
                        <div class="news-card">
                            <div class="news-card__content">
                                <div class="news-attributes">
                                     <span class="news-attributes__date">
                                         <i class="far fa-calendar" style="margin-right:5px;"></i>
                                          <?=date("H:i | d.m.Y",strtotime($newsItem['created_date']))?>
                                     </span>

                                    <a class="news-attributes__tag" href="?controller=news_category&id=<?=$newsItem['category_id']?>" style="color: #17206a;"><?=$getCategoryName['title']?></a>
                                    <span class="fas fa-eye" style="margin-left:12px;font-size: ;color: #9e9e9e;"> <?=$newsItem['seen_count']?></span>

                                </div>
                                <a class="news-card__text"><span>Nomi: </span><?=$newsItem['title']?></a>
                                <a class="news-card__text"><span>Muallif:</span><?=$newsItem['description']?></a>
                            </div>
                            <a class="news-card__img" href="?controller=news_view&id=<?=$newsItem['id']?>"><img src="<?=$image?>" style="background-color: rgb(230, 230, 230); transition: all 0.1s ease 0s; filter: blur(0px);"></a>

                        </div>
                        <div class="button_groups mt-3">
                            <a href="<?=$pdfFile?>" download="" class="btn btn-success btn-lg">Yuklab olish <i class="fas fa-download"></i></a>
                            <a href="?controller=news_view&id=<?=$newsItem['id']?>" class=" more btn btn-outline-success text-success btn-lg">Batafsil...</a>
                        </div>
                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>
    </div>
</div>
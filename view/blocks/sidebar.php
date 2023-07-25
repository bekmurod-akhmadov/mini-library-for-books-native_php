<aside class="main__aside">
    <div>
        <div class="aside-title">
            <h1 class="secondary-title">Eng yangi kitoblar</h1>
        </div>
        <div class="news__list">
            <?php if(!empty($actualNews)): ?>

                <?php foreach ($actualNews as $actualItem): ?>

                    <div class="news__item">
                        <div class="hot-news" >
                            <a class="hot-news__image" href="?controller=news_view&id=<?=$actualItem['id']?>" style="display: block;">
                                <img src="/uploads/news/<?=$actualItem['id']?>/<?=$actualItem['image']?>" style="background-color: rgb(230, 230, 230); transition: all 0.1s ease 0s; filter: blur(0px);">
                            </a>

                            <a class="hot-news__text" href="?controller=news_view&id=<?=$actualItem['id']?>" style="display: block;color: #17206a;">

                                ​​<?=$actualItem['title']?>

                            </a>
                            <div class="news-attributes aside-hot-news">

                                  <span class="news-attributes__date">
                                      <i class="far fa-calendar" style="margin-right: 5px;"></i>
                                     <?= date("H:i | d.m.Y",strtotime($actualItem['created_date']))?>
                                  </span>
                                <span class="news-attributes__views"><i class="fas fa-eye">&nbsp</i><?=$actualItem['seen_count']?></span>

                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>
        <div class="aside-title">
            <h1 class="secondary-title">Ko'p yuklanganlar</h1>
        </div>
        <div class="news__list">

            <?php if(!empty($getTopNews)): ?>
                <?php foreach ($getTopNews as $topItem): ?>
                    <div class="news__item">
                        <div class="hot-news">
                            <a class="hot-news__text" href="?controller=news_view&id=<?=$topItem['id']?>" style="display: block; color: #17206a;">​​
                                <?=$topItem['title']?>
                            </a>
                            <div class="news-attributes aside-hot-news">
                                <i class="far fa-calendar" style="margin-right: 5px;"></i>
                              <span class="news-attributes__date"><?= date("H:i | d.m.Y",strtotime($topItem['created_date']))?></span>
                                <span class="news-attributes__views"><i class="fas fa-eye">&nbsp</i></span>
                                <span class="news-attributes__views"><?=$topItem['seen_count']?></span>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>

    </div>
</aside>
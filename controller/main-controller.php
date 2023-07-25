<?php  require_once __DIR__ . '/../model/main-model.php';
$actualNews = getActualNews();
$getTopNews = getTopNews();
#Menu
$parentMenus = getParentMenus();
$getSocials = getSocials();
if(!empty($_GET) && !empty($_GET['controller'])){
    $controller = $_GET['controller'];
    switch ($controller){

        case 'news_view':

            $id = $_GET['id'];
            $model = getNewsItem($id);
            if(!empty($model)){
                addNewsCounter($id,SEEN_COUNT);
                $categoryName = getCategoryName($model['category_id']);
                require_once 'view/news_view.php';
            }else{
                require_once 'view/404.php';
            }

        break;
        case 'Foydali sahifalar':
            require_once 'view/foydali_sahifalar.php';
        break;

        case 'murojat_uchun':
            require_once 'view/murojat_uchun.php';
        break;

        case 'muallif_haqida':
            require_once 'view/muallif_haqida.php';
        break;
        case 'reklama':
            require_once 'view/reklama.php';
        break;


        case 'news_category':
            $categoryId = $_GET['id'];
            $categoryName = getCategoryName($categoryId);
            $categoryNews = getNewsByCategory($categoryId);

            if(!empty($categoryNews)){
                require_once 'view/news_category.php';
            }else{
                require_once 'view/404.php';
            }

        break;  
    }
}else{

    #get All news
    $allNews = getNews();

    #Quotes
    $getQuotes = getQuote();
    $randNum = rand(0,count($getQuotes) -1 );
    $resultRandom = ($getQuotes[$randNum]['title']);
    $authorQuote =$getQuotes[$randNum]['author'];
    require_once VIEW . '/index.php';
}




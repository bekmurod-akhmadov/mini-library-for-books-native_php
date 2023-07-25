<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kutubxona.uz</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="<?=ASSETS?>/css/main.chunk.css" rel="stylesheet">
    <link href="/assets/css/custom.css" rel="stylesheet">
</head>

<body>

    <div id="root">
        <div class="preloader">
            <img style="display:inline; height:400px" src="<?=ASSETS?>/images/loader.gif" alt="">
        </div>
        <header class="header">
            <div class="container">
                <div class="header__inner">
                    <a class="header__logo" href="/">
                        <div class="header__logo-img"></div>
                        <span>Kutubxona.uz</span>
                    </a>
                    <nav class="header__nav">
                        <ul class="header__nav-list">
                            <?php if(!empty($parentMenus)):?>

                                <?php foreach($parentMenus as $parentMenu): ?>

                                    <?php $childMenus = getChildMenus($parentMenu['id']) ?>

                                    <?php if(!empty($childMenus)): ?>
                                        <li class="header__nav-item hover-border">
                                            <div class="header__nav-link"><span
                                                    style="white-space: nowrap;"><?=$parentMenu['title']?></span>
                                            </div>
                                            <div class="nav-dropdown">
                                                <ul class="nav-dropdown__list">
                                                    <?php foreach($childMenus as $childMenu): ?>
                                                         <li class="nav-dropdown__item"><a class="nav-dropdown__link"
                                                                href="<?=$childMenu['link']?>"><?=$childMenu['title']?></a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </li>
                                    <?php else: ?>

                                        <li class="header__nav-item hover-border"><a class="header__nav-link"
                                                href="?controller=<?=$parentMenu['title']?>"><?=$parentMenu['title']?></a>
                                        </li>

                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </ul>
                    </nav>
                </div>
            </div>
            <div class="header__search ">
                <form>
                    <div class="container">
                        <div class="header__search-row">
                            <input name="q" type="text" placeholder="Izlash" value="">
                            <div class="mob-search-btn-wrap">
                                <button type="submit">
                                    <svg class="icon " width="16" height="16">
                                        <use xlink:href="/assetsfront/sprite/sprite.svg#i-search"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </header>
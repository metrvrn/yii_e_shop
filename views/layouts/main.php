<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\sale\Basket;
use app\models\catalog\Sections;

$homePagePaths = ['/', '/main/index'];
$curPath = Yii::$app->getRequest()->getUrl();
$isHomepage =  (bool) array_intersect([$curPath], $homePagePaths);

$catalogSections = Sections::getTree();

$basketQuantity = Basket::getQuantity();
$basketSum = Basket::getSum();
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400,700&amp;subset=cyrillic" rel="stylesheet">
        <link rel="stylesheet" href="/fonts/fontawesome/web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" href="/css/main.css">
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div class="main-wrapper">
        <header>
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-4">
                            <a href="<?=Url::toRoute('main/delivery')?>" class="header-top__link">Доставка и оплата</a>
                            <span class="header-top__separator">|</span>
                            <a href="<?=Url::toRoute('main/about');?>" class="header-top__link">О компании</a>
                        </div>
                        <div class="col-xs-3 col-xs-offset-5">
                            <?php if(Yii::$app->user->isGuest) : ?>
                                <a href="<?=Url::toRoute('user/login');?>" class="header-top__link">Войти</a>
                                <span class="header-top__separator">|</span>
                                <a href="<?=Url::toRoute('user/registration');?>" class="header-top__link">Регистрация</a>
                            <?php else: ?>
                                <a href="<?=Url::toRoute('user/profile');?>" class="header-top__link"><?=Yii::$app->user->identity->name;?></a>
                                <span class="header-top__separator">|</span>
                                <a href="<?=Url::toRoute('user/logout');?>" class="header-top__link">Выйти</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-3">
                            <a class="header-middle__logo-link" href="<?=Url::toRoute('main/index');?>">
                                <div class="header-middle__logo-text">Магазин</div>
                                <div class="header-middle__logo-description">Канцелярских товаров</div>
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <div class="header-middle__contacts clearfix">
                                <div class="header-middle__contacts-phone">
                                    <i class="header-middle__contacts-phone-icon fa fa-phone" aria-hidden="true"></i>
                                    <span class="header-middle__contacts-phone-value">7 777 777 77 77</span>
                                </div>
                                <div class="header-middle__contacts-address">
                                    <a href="" class="header-middle__contacts-address-link">
                                        <i class="header-middle__contacts-address-icon fa fa-map-marker" aria-hidden="true"></i>
                                        <span class="header-middle__contacts-address-value">Пушкина-колотушкина 25а</span>
                                    </a>
                                    </div>
                            </div>
                            <div class="header-middle__search">
                                <form action="" class="header-middle__search-form">
                                    <input id="mainSearchInput" data-url="<?=Url::toRoute(['catalog/search-ajax', 'pattern' => 'rPattern']);?>" type="text" class="header-middle__search-input" autocomplete="off">
                                </form>
                                <div class="header-middle__search-response-container">
                                    <div id="searchResponseWrap" data-detail-url="<?=Url::toRoute(['catalog/detail', 'id' => 'rID']);?>" class="header-middle__search-response-wrap">
                                        <button id="searchResponseCloseBtn" class="header-middle__search-close-btn">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <ul id="searchResponseList"  class="header-middle__search-response-list"></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <a href="<?=Url::toRoute(['basket/index']);?>" class="header-middle__basket-link">
                                <div class="header-middle__basket clearfix">
                                    <div class="header-middle__basket-icon-wrap">
                                        <i class="header-middle__basket-icon fa fa-shopping-basket" aria-hidden="true"></i>
                                    </div>
                                    <div class="header-middle__basket-info">
                                        <div class="header-middle__basket-quantity-wrap">
                                            <span class="header-middle__basket-quantity-text">Товаров: </span>
                                            <span id="header_basket_quantity_val" class="header-middle__basket-quantity-value"><?=$basketQuantity;?></span>
                                        </div>
                                        <div class="header-middle__basket-price-wrap">
                                            <span class="header-middle__basket-price-text">На сумму:</span>
                                            <span id="header_basket_price_val" class="header-middle__basket-price-value"><?=$basketSum;?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-3 catalog-dropdown__container no-padding">
                            <?php if($isHomepage) : ?>
                                <a id="catalog_link" href="<?=Url::toRoute('catalog/index');?>" class="header-bottom__link header-bottom__link--catalog">Каталог</a>
                            <?php else : ?>
                                <button id="catalog_dropdown_btn" class="header-bottom__link header-bottom__link--catalog header-bottom__link--catalog_btn">Каталог</button>
                            <?php endif; ?>
                            <?php if(!empty($catalogSections)) :?>
                                <ul id="catalog_dropdown_menu" class="catalog-dropdown <?= $isHomepage ? '' : 'catalog-dropdown--close'?>">
                                    <?php foreach($catalogSections as $section): ?>
                                        <li class="catalog-dropdown__elem">
                                        <a href="<?=Url::toRoute(['catalog/main', 'section' => $section['id']])?>" class="catalog-dropdown__link">
                                            <span class="catalog-dropdown__category-name"><?=$section['name'];?></span>
                                            <i class="fas fa-arrow-right catalog-dropdown__category-icon"></i>
                                        </a>
                                        <?php if(isset($section['children']) && is_array($section['children'])) : ?>
                                            <div class="catalog-dropdown__submenu" style="width: 300%;">
                                                <div class="row">
                                                    <?php foreach($section['children'] as $subsection) : ?>
                                                        <div class="col-xs-3">
                                                            <a class="catalog-dropdown__submenu-link" href="<?=Url::toRoute(['catalog/main', 'section' => $subsection['id']]);?>" class="catalog-dropdown__submenu-link">
                                                                <span><?=$subsection['name']?></span>
                                                            </a>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                </div>
                                        <?php endif; ?>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <div class="col-xs-3"><a href="" class="header-bottom__link">Новинки</a></div>
                        <div class="col-xs-3"><a href="" class="header-bottom__link">Лучшие</a></div>
                        <div class="col-xs-3"><a href="" class="header-bottom__link">Скидки</a></div>
                    </div>
                </div>
            </div>

        </header>
        <div class="container">
            <div class="row main">
                <?= $content ?>
            </div>
        </div>
        <footer class="main-footer">
            <div class="main-footer__delimeter"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-4">
                        <div class="main-footer__info">
                            <div class="main-footer__title">
                                <h4>Магазин</h4>
                            </div>
                            <div class="main-footer__desctiprion">
                                <span>Канцелярских товаров</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <?php $this->registerJsFile("@web/js/main.js");?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
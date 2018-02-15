<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\catalog\Sections;

$homepagePaths = ['/', '/index.php', '/index.php?r=main/index', '/?r=main/index'];
$curPath = array(Yii::$app->getRequest()->getUrl());
$isHomepage = (bool) array_intersect($homepagePaths, $curPath);

$catalogSections = Sections::find()->where(['depth_level' => 1])->orderBy('name')->all();
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
        <link rel="stylesheet" href="css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400,700&amp;subset=cyrillic" rel="stylesheet">
        <link rel="stylesheet" href="fonts/fontawesome/web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" href="css/main.css">
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-4">
                        <a href="?r=main/delivery" class="header-top__link">Доставка и оплата</a>
                        <span class="header-top__separator">|</span>
                        <a href="?r=main/about" class="header-top__link">О компании</a>
                    </div>
                    <div class="col-xs-3 col-xs-offset-5">
                        <a href="?r=user/login" class="header-top__link">Войти</a>
                        <span class="header-top__separator">/</span>
                        <a href="?r=user/registration" class="header-top__link">Регистрация</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <div class="col-xs-3">
                        <a class="header-middle__logo-link" href="?r=main/index">
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
                                <input type="text" class="header-middle__search-input">
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <a href="?r=sale/basket" class="header-middle__basket-link">
                            <div class="header-middle__basket clearfix">
                                <div class="header-middle__basket-icon-wrap">
                                    <i class="header-middle__basket-icon fa fa-shopping-basket" aria-hidden="true"></i>
                                </div>
                                <div class="header-middle__basket-info">
                                    <div class="header-middle__basket-quantity-wrap">
                                        <span class="header-middle__basket-quantity-text">Товаров: </span>
                                        <span id="header_basket_quantity_val" class="header-middle__basket-quantity-value">25</span>
                                    </div>
                                    <div class="header-middle__basket-price-wrap">
                                        <span class="header-middle__basket-price-text">На сумму:</span>
                                        <span id="header_basket_price_val" class="header-middle__basket-price-value">247.54</span>
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
                        <a id="catalog_link" href="<?=Url::toRoute('catalog/index');?>" class="header-bottom__link header-bottom__link--catalog">Каталог</a>
                        <?php if(!empty($catalogSections)) :?>
                            <ul id="catalog_dropdown" class="catalog-dropdown <?= $isHomepage ? '' : 'catalog-dropdown--close'?>">
                                <?php foreach($catalogSections as $section): ?>
                                    <li class="catalog-dropdown__elem">
                                    <a href="<?=Url::toRoute(['catalog/main', 'section' => $section['section_id']])?>" class="catalog-dropdown__link clearfix">
                                        <span class="catalog-dropdown__category-name"><?=$section['name'];?></span>
                                        <i class="fas fa-arrow-right catalog-dropdown__category-icon"></i>
                                    </a>
                                    <!-- <ul class="catalog-dropdown__submenu">
                                        <li class="catalog-dropdown__submenu-elem"><a href="#" class="catalog-dropdown__submenu-link">Submenu 1</a></li>
                                        <li class="catalog-dropdown__submenu-elem"><a href="#" class="catalog-dropdown__submenu-link">Submenu 2</a></li>
                                        <li class="catalog-dropdown__submenu-elem"><a href="#" class="catalog-dropdown__submenu-link">Submenu 3</a></li>
                                        <li class="catalog-dropdown__submenu-elem"><a href="#" class="catalog-dropdown__submenu-link">Submenu 4</a></li>
                                    </ul> -->
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
    <footer>&copy; 2014 by My Company</footer>
    <?php $this->registerJsFile("@web/js/main.js");?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
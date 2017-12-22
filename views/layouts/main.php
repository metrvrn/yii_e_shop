<?php
use yii\helpers\Html;
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="stylesheet" href="assets/abd25faa/css/bootstrap.css">
        <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400,700&amp;subset=cyrillic" rel="stylesheet">
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
                        <div class="header-middle__logo-text">Магазин</div>
                        <div class="header-middle__logo-description">Канцелярских товаров</div>
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
                    <div class="col-xs-3"><a href="" class="header-bottom__link header-bottom__link--catalog">Каталог</a></div>
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
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
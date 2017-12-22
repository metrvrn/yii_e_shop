<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $content string */
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <?= Html::csrfMetaTags() ?>
        <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400,700&amp;subset=cyrillic" rel="stylesheet">
        <link rel="stylesheet" href="mdl/material.css">
        <link rel="stylesheet" href="css/admin-main.css">
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div class="mdl-layout__container">
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            <header class="mdl-layout__header">
                <div class="mdl-layout__header-row">
                    <div class="mdl-layout-spacer"></div>
                    <nav class="mdl-navigation">
                        <a class="mdl-navigation__link" href="">На сайт</a>
                        <a class="mdl-navigation__link" href="">Выйти</a>
                    </nav>
                </div>
                <div class="header__tabs mdl-layout__tab-bar mdl-js-ripple-effect">
                    <a href="#scroll-tab-1" class="mdl-layout__tab is-active">Tab 1</a>
                    <a href="#scroll-tab-2" class="mdl-layout__tab">Tab 2</a>
                    <a href="#scroll-tab-3" class="mdl-layout__tab">Tab 3</a>
                    <a href="#scroll-tab-4" class="mdl-layout__tab">Tab 4</a>
                    <a href="#scroll-tab-5" class="mdl-layout__tab">Tab 5</a>
                    <a href="#scroll-tab-6" class="mdl-layout__tab">Tab 6</a>
                </div>
            </header>

            <div class="mdl-layout__drawer">
                <span class="mdl-layout-title">Настройки</span>
                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="">Каталог</a>
                    <a class="mdl-navigation__link" href="">Пользователи</a>
                    <a class="mdl-navigation__link" href="">Магазин</a>
                    <a class="mdl-navigation__link" href="">Система</a>
                </nav>
            </div>
            <main class="mdl-layout__content">
                <div class="page-content"><?= $content; ?></div>
            </main>
        </div>
    </div>
    <script src="mdl/material.js"></script>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
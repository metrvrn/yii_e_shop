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
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&amp;subset=cyrillic" rel="stylesheet">
        <link rel="stylesheet" href="css/admin-main.css">
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <header class="main-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-2 nopadding">
                    <a href="?r=admin/catalog/" class="main-header__link"><b>Администрирование</b></a>
                </div>
                <div class="col-xs-1 col-xs-offset-8">
                    <a class="main-header__to-site-link" href="">На сайт</a>
                </div>
                <div class="col-xs-1">
                    <a class="main-header__user-logout-link" href="">Выход</a>
                </div>
            </div>
        </div>
    </header>
    <main class="container-fluid">
        <div class="row">
            <div class="col-xs-2 admin-sidebar nopadding">
                <aside class="admin-sidebar__list">
                    <div class="admin-sidebar__list-item admin-sidebar__list-item--active">
                        <a href="?r=admin/statistics/index" class="admin-sidebar__list-link">Сводка</a>
                    </div>
                    <div class="admin-sidebar__list-item">
                        <a href="?r=admin/order/index" class="admin-sidebar__list-link">Заказы</a>
                    </div>
                    <div class="admin-sidebar__list-item">
                        <a href="?r=admin/basket/index" class="admin-sidebar__list-link">Корзины</a>
                    </div>
                    <div href="?r=admin/user/index" class="admin-sidebar__list-item">
                        <a href="?r=admin/user/index" class="admin-sidebar__list-link">Пользователи</a>
                    </div>
                    <div href="?r=admin/catalog/index" class="admin-sidebar__list-item">
                        <a href="?r=admin/catalog/upload" class="admin-sidebar__list-link">Каталог</a>
                    </div>
                    <div href="?r=admin/system/index" class="admin-sidebar__list-item">
                        <a href="?r=admin/system/index" class="admin-sidebar__list-link">Система</a>
                    </div>
                </aside>
            </div>
            <div class="col-xs-10 col-xs-offset-2">
                <?= $content ?>
            </div>
        </div>
    </main>

    <footer>&copy; 2014 by My Company</footer>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
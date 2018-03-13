<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="stylesheet" href="/css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&amp;subset=cyrillic" rel="stylesheet">
        <link rel="stylesheet" href="/fonts/fontawesome/web-fonts-with-css/css/fontawesome-all.css">
        <link rel="stylesheet" href="/css/admin-main.css">
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
                        <a href="<?=Url::toRoute('admin/statistics/index')?>" class="admin-sidebar__list-link">Сводка</a>
                    </div>
                    <div class="admin-sidebar__list-item">
                        <a href="<?=Url::toRoute('admin/sale/index')?>" class="admin-sidebar__list-link">Магазин</a>
                        <ul class="admin-sidebar-dropdown">
                            <li class="admin-sidebar-dropdow__element">
                                <a href="<?=Url::toRoute('admin/delivery/index');?>" class="admin-sidebar-dropdown__link">Доставки</a>
                            </li>
                            <li class="admin-sidebar-dropdow__element">
                                <a href="<?=Url::toRoute('admin/payment/index');?>" class="admin-sidebar-dropdown__link">Оплаты</a>
                            </li>
                        </ul>
                    </div>
                    <div class="admin-sidebar__list-item">
                        <a href="?r=admin/order/index" class="admin-sidebar__list-link">Заказы</a>
                    </div>
                    <div class="admin-sidebar__list-item">
                        <a href="?r=admin/basket/index" class="admin-sidebar__list-link">Корзины</a>
                    </div>
                    <div class="admin-sidebar__list-item">
                        <a href="?r=admin/user/index" class="admin-sidebar__list-link">Пользователи</a>
                    </div>
                    <div class="admin-sidebar__list-item">
                        <a href="<?=Url::toRoute(['admin/catalog/upload'])?>" class="admin-sidebar__list-link">Каталог</a>
                    </div>
                    <div class="admin-sidebar__list-item">
                        <a href="?r=admin/system/index" class="admin-sidebar__list-link">Система</a>
                        <ul class="admin-sidebar-dropdown">
                            <li class="admin-sidebar-dropdow__element">
                                <a href="<?=Url::toRoute('admin/system/files');?>" class="admin-sidebar-dropdown__link">Файлы</a>
                            </li>
                            <li class="admin-sidebar-dropdow__element">
                                <a href="" class="admin-sidebar-dropdown__link">Настройки</a>
                            </li>
                            <li class="admin-sidebar-dropdow__element">
                                <a href="" class="admin-sidebar-dropdown__link">Еще чет</a>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
            <div class="col-xs-10 col-xs-offset-2">
                <div class="admin-content-container">
                    <?= $content ?>
                </div>
            </div>
        </div>
    </main>

    <footer>&copy; 2014 by My Company</footer>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
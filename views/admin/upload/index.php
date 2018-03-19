<?php
use yii\helpers\Url;
?>

<div class="row">
    <div class="col-xs-12">
        <a href="<?=Url::toRoute('admin/upload/upload-products')?>" class="btn btn-success">Загрузить товары</a>
    </div>
    <div class="col-xs-12">
        <a href="<?=Url::toRoute('admin/upload/upload-properties-types')?>" class="btn btn-success">Загрузить типы свойст товаров</a>
    </div>
    <div class="col-xs-12">
        <a href="<?=Url::toRoute('admin/upload/upload-properties')?>" class="btn btn-success">Загрузить свойства товаров</a>
    </div>
</div>
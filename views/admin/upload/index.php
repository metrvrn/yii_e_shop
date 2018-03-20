<?php
use yii\helpers\Url;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Товары</h3>
            </div>
            <div class="panel-body">
                <button id="uploadBtn" data-panel="statusProducts" class="btn btn-success" data-url="<?=Url::toRoute(['admin/upload/upload-products']);?>">Загрузить</button>
                <a class="btn btn-danger" href="<?=Url::toRoute('admin/upload/truncate-products');?>">Очистить таблицу</a>
                <p class="bg-danger upload-status-panel" style="display: none" id="statusProducts"></p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Типы свойст товаров</h3>
            </div>
            <div class="panel-body">
                <button id="uploadBtn" data-panel="statusPropertiesType" class="btn btn-success" data-url="<?=Url::toRoute(['admin/upload/upload-properties-types']);?>">Загрузить</button>
                <a class="btn btn-danger" href="<?=Url::toRoute('admin/upload/truncate-properties-types');?>">Очистить таблицу</a>
                <p class="bg-danger upload-status-panel" style="display: none" id="statusPropertiesType"></p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Свойства товаров</h3>
            </div>
            <div class="panel-body">
                <button id="uploadBtn" data-panel="statusProperties" class="btn btn-success" data-url="<?=Url::toRoute(['admin/upload/upload-properties']);?>">Загрузить</button>
                <a class="btn btn-danger" href="<?=Url::toRoute('admin/upload/truncate-properties');?>">Очистить таблицу</a>
                <p class="bg-danger upload-status-panel" style="display: none" id="statusProperties"></p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Типы цен</h3>
            </div>
            <div class="panel-body">
                <button id="uploadBtn" data-panel="statusPricesTypes" class="btn btn-success" data-url="<?=Url::toRoute(['admin/upload/upload-prices-types']);?>">Загрузить</button>
                <a class="btn btn-danger" href="<?=Url::toRoute('admin/upload/truncate-prices-types');?>">Очистить таблицу</a>
                <p class="bg-danger upload-status-panel" style="display: none" id="statusPricesTypes"></p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Цены</h3>
            </div>
            <div class="panel-body">
                <button id="uploadBtn" data-panel="statusPrices" class="btn btn-success" data-url="<?=Url::toRoute(['admin/upload/upload-prices']);?>">Загрузить</button>
                <a class="btn btn-danger" href="<?=Url::toRoute('admin/upload/truncate-prices');?>">Очистить таблицу</a>
                <p class="bg-danger upload-status-panel" style="display: none" id="statusPrices"></p>
            </div>
        </div>
    </div>
</div>

<?php $this->registerJsFile("@web/js/admin/upload/index.js"); ?>
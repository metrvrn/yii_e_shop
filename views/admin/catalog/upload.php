<?php
use yii\widgets\Pjax;

$this->registerJsFile('@web/js/admin/catalog/upload.js');
?>

<div class="row">
    <div class="col-xs-4">
        <div class="panel panel-default">
            <div class="panel-heading">Каталог</div>
            <div class="panel-body">
                <button class="btn btn-primary" id="catalog_upload_btn">
                    Обновить сейчас
                </button>
                <div class="progress" id="catalog_progress_container" style="display: none">
                    <div class="progress-bar progress-bar-info" id="catalog_progress_bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 70%"></div>
                </div>
                <p id="catalog_error_msg" style="display: none" class="bg-danger"></p>
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="panel panel-default">
            <div class="panel-heading">Цены</div>
            <div class="panel-body">
                Panel content
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="panel panel-default">
            <div class="panel-heading">Остатки</div>
            <div class="panel-body">
                Panel content
            </div>
        </div>
    </div>
</div>


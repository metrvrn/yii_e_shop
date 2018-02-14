<?php
use yii\helpers\Url;
?>

<div class="row">
    <div class="col-xs-4">
        <div class="panel panel-default">
            <div class="panel-heading">Каталог</div>
            <div class="panel-body">
                <a href=<?= Url::toRoute('upload-catalog'); ?> class="btn btn-primary" id="catalog_upload_btn">
                    Обновить сейчас
                </a>
                <p id="catalog_error_msg" style="display: <?= $catalogMsg ? 'block' : 'none';?>" class="bg-danger">
                    <?=$catalogMsg;?>
                </p>
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


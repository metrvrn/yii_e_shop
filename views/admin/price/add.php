<?php
use yii\helpers\Url;
?>

<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h4 class="pull-left">Типы цены</h4>
        <a href="<?= Url::toRoute('admin/price-type/add')?>" class="btn btn-success pull-right">
            <span>Добавить</span>
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <div class="panel-body">
        <?php if(!empty($deliveries)) : ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td class="delivery-table__small-cell">ID</td>
                        <td>Название</td>
                        <td>Описание</td>
                        <td class="delivery-table__small-cell">Редактировать</td>
                        <td class="delivery-table__small-cell">Удалить</td>
                    </tr>
                </thead>
                <?php foreach($deliveries as $delivery) : ?>
                    <tr>
                        <td><?=$delivery->id;?></td>
                        <td><?=$delivery->name;?></td>
                        <td><?=$delivery->description;?></td>
                        <td>
                            <a href="<?=Url::toRoute(['admin/price-type/update', 'id' => $delivery->id]);?>">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="<?=Url::toRoute(['admin/price-type/remove', 'id'=>$delivery->id]);?>">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
        <?php else : ?>
            <div class="well">Доставок нет</div>
        <?php endif; ?>
    </div>
</div>
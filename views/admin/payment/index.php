<?php
use yii\helpers\Url;
?>

<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h4 class="pull-left">Типы оплат</h4>
        <a href="<?= Url::toRoute('admin/payment/add')?>" class="btn btn-success pull-right">
            <span>Добавить</span>
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <div class="panel-body">
        <?php if(!empty($payments)) : ?>
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
                <?php foreach($payments as $payment) : ?>
                    <tr>
                        <td><?=$payment->id;?></td>
                        <td><?=$payment->name;?></td>
                        <td><?=$payment->description;?></td>
                        <td>
                            <a href="<?=Url::toRoute(['admin/payment/update', 'id' => $payment->id]);?>">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="<?=Url::toRoute(['admin/payment/remove', 'id'=>$payment->id]);?>">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
        <?php else : ?>
            <div class="well">Оплат нет</div>
        <?php endif; ?>
    </div>
</div>
<?php
use yii\helpers\Url;
?>

<?php if(!empty($errors)) : ?>
    <p class="bg-danger">
        <?php foreach($errors as $error) : ?>
            <span><?php print_r($error);?><br></span>
        <?php endforeach; ?>
    </p>
<?php endif; ?>

<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h4 class="pull-left">Типы доставок</h4>
        <button class="btn btn-success pull-right" id="openDeliveryFormBtn">
            <span>Добавить</span>
            <i class="fas fa-plus"></i>
        </button>
    </div>
    <div id="deliveryFormWrapper" class="delivery-panel-form">
        <h4>Новая доставка</h4>
        <form action="<?=Url::toRoute('admin/sale/add-delivery');?>" method="POST">
           <div class="clearfix">
                <div class="form-group">
                    <input name="name" class="form-control" type="text" placeholder="Название">
                </div>
                <div class="form-group">
                    <textarea name="description" class="form-control" type="textarea" placeholder="Описание"></textarea>
                </div>
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>">
                <div class="form-group clearfix">
                    <div class="pull-right">
                        <button id="closeDeliveryFormBtn" class="btn btn-danger">Отмена</button>
                        <input class="btn btn-primary" type="submit" value="Сохранить">
                    </div>
                </div>
           </div>
            
        </form>
    </div>
    <div class="panel-body">
        <?php if(!empty($deliveries)) : ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Название</td>
                        <td>Описание</td>
                        <td>Редактировать</td>
                        <td>Удалить</td>
                    </tr>
                </thead>
                <?php foreach($deliveries as $delivery) : ?>
                    <tr>
                        <td><?=$delivery->id;?></td>
                        <td><?=$delivery->name;?></td>
                        <td><?=$delivery->description;?></td>
                        <td>
                            <a href="<?=Url::toRoute('admin/sale/update-delivery');?>">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="<?=Url::toRoute(['admin/sale/remove-delivery', 'id' => $delivery->id]);?>">
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
<?php $this->registerJsFile("@web/js/admin/sale/delivery.js");?>
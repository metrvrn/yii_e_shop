<?php
use yii\helpers\Url;
?>

<?php if(!empty($basketItems)) : ?>
    <div class="col-xs-9">
        <table class="table-bordered table-hover basket-table">
            <thead>
                <tr>
                    <th>Товар</th>
                    <th>Цена</th>
                    <th>Колличество</th>
                    <th>Сумма</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($basketItems as $item) : ?>
                    <tr>
                        <td><?=$item['name']?></td>
                        <td><?=$item['price']?></td>
                        <td>
                        <div class="input-group basket-table__quantity-control">
                            <input type="text" class="form-control" value="<?=$item['quantity']?>">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                            </span>
                        </div>
                        </td>
                        <td><?=number_format($item['price']*$item['quantity'], 2);?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div id="basket_sidebar" class="col-xs-3">
        <div class="basket-sidepanel">
            <h3>Корзина</h3>
            <div class="basket-sidepanel__separator"></div>
            <table class="table-bordered basket-sidepanel__table">
                <tr>
                    <td>Наименований</td>
                    <td><?=$basketItemsCount?></td>
                </tr>
                <tr>
                    <td>Сумма</td>
                    <td><?=$basketSum?>&#8381;</td>
                </tr>
            </table>
            <a href="<?=Url::toRoute(['order/checkout']);?>" class="basket-sidepanel__order-link">
                Оформить заказ
            </a>
        </div>
    </div>
<?php else : ?>
    
<?php endif; ?>
<?php $this->registerJsFile('@web/js/basket/main.js');?>
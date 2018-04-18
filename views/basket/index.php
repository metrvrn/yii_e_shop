<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<?php if(!empty($basketItems)) : ?>
    <div class="col-xs-9">
        <table id="basketTable" data-url="<?=Url::toRoute(['basket/update', 'id' => 'rID', 'quantity' => 'rQuantity']);?>" class="table-bordered table-hover basket-table">
            <thead>
                <tr>
                    <th>Товар</th>
                    <th>Цена</th>
                    <th>Колличество</th>
                    <th>Сумма</th>
                    <th>Удалить</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($basketItems as $item) : ?>
                    <tr>
                        <td><?=$item['name']?></td>
                        <td><?=$item['price']?></td>
                        <td>
                        <div class="input-group basket-table__quantity-control">
                            <input id="basketQuantityInput<?=$item->product_id;?>" type="text" class="form-control" data-old-value="<?=$item['quantity']?>" value="<?=$item['quantity']?>">
                            <span class="input-group-btn">
                                <button id="basketQuantityBtn" data-id="<?=$item->product_id;?>" class="btn btn-default" type="button">
                                    <i class="basket-table__quantity-btn-icon fas fa-sync-alt"></i>
                                </button>
                            </span>
                        </div>
                        </td>
                        <td><?=number_format($item['price']*$item['quantity'], 2);?></td>
                        <td><a class="basket-table__remove-btn" href="<?=Url::toRoute(['basket/remove-item', 'id' => $item->id]);?>">
                            <i class="basket-table__remove-btn-icon far fa-trash-alt"></i>
                        </a></td>
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
                    <td>
                        <span id="basketSidepanelQuantity"><?=$basketItemsCount?></span>
                    </td>
                </tr>
                <tr>
                    <td>Сумма</td>
                    <td >
                        <span id="basketSidepanelSum"><?=$basketSum?></span>
                        <span>&#8381;</span>
                    </td>
                </tr>
            </table>
            <a class="basket-sidepanel__checkout-btn" href="<?=Url::toRoute(['order/checkout']);?>">
                Оформить заказ
            </a>
            <a class="basket-sidepanel__clear-btn" href="<?=Url::toRoute(['basket/remove']);?>" >
                Очистить корзину
            </a>
        </div>
        <?php
            echo LinkPager::widget([
                'pagination' => $pagination
            ]);
        ?>
    </div>
<?php else : ?>
    <p class="bg-danger basket__empty-msg">Ваша корзина пуста</p>
<?php endif; ?>
<?php $this->registerJsFile('@web/js/basket/main.js');?>
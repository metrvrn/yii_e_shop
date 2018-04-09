<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<div class="row">
    <div class="col-xs-12">
        <h3>Заказ № <?=$order->id;?></h3>
        <form action="<?=Url::toRoute(['admin/order/detail']);?>">
            <div class="row">
                <div class="col-xs-6">
                    <table class="table-bordered order-detail__table">
                        <tr>
                            <th colspan="2">Пользователь</th>
                        </tr>
                        <tr>
                            <td>Имя</td>
                            <td><input type="text" name="user_name" id="" value="<?=$order->user_name;?>"></td>
                        </tr>
                        <tr>
                            <td>Фамилия</td>
                            <td><input type="text" name="user_surname" value="<?=$order->user_surname?>"></td>
                        </tr>
                        <tr>
                            <td>Отчество</td>
                            <td><input type="text" name="user_patronymic" value="<?=$order->user_patronymic;?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="user_email" value="<?=$order->user_email;?>"></td>
                        </tr>
                        <tr>
                            <td>Телефон</td>
                            <td><input type="text" name="user_phone" value="<?=$order->user_phone;?>"></td>
                        </tr>
                        <tr>
                            <td>Рабочий телефон</td>
                            <td><input type="text" name="user_workphone" value="<?$order->user_workphone;?>"></td>
                        </tr>
                        <tr>
                            <td>Компания</td>
                            <td><input type="text" name="user_company" value="<?$order->user_company;?>"></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-6">
                    <table class="table-bordered order-detail__table">
                        <tr>
                        <th colspan="2">Доставка</th>
                        </tr>
                        <tr>
                            <td>Тип доставки</td>
                            <td>
                                <select name="delivery">
                                    <?php foreach($delivery as $d) : ?>
                                        <option value="<?=$d->id?>"><?=$d->name;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Город</td>
                            <td><input type="text" name="delivery_city" value="<?=$order->delivery_city;?>"></td>
                        </tr>
                        <tr>
                            <td>Улица</td>
                            <td><input type="text" name="delivery_street" value="<?=$order->delivery_street;?>"></td>
                        </tr>
                        <tr>
                            <td>Дом</td>
                            <td><input type="text" name="delivery_house_number" value="<?=$order->delivery_house_number;?>"></td>
                        </tr>
                        <tr>
                            <td>Кваритра/Офис</td>
                            <td><input type="text" name="delivery_office_number" value="<?=$order->delivery_office_number?>"></td>
                        </tr>
                        <tr>
                            <th colspan="2">Оплата</th>
                        </tr>
                        <tr>
                            <td>Тип оплаты</td>
                            <td>
                                <select name="payment">
                                    <?php foreach($payment as $p) : ?>
                                        <option value="<?=$p->id?>"><?=$p->name?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="clearfix">
                <div class="pull-right">
                    <input type="reset" value="Отмена">
                    <input type="submit" value="Созранить">
                </div>
            </div>
        </form>
        <table class="table-bordered order-detail__items-table">
            <tr>
                <th>Название</th>
                <th>Цена</th>
                <th>Колличество</th>
                <th>Сумма</th>
                <th>Добавлен</th>
                <th>Удалить</th>
            </tr>
            <?php foreach($basketItems as $item) : ?>
                <tr>
                    <td><?=$item->name;?></td>
                    <td><?=$item->price;?></td>
                    <td>
                    <div class="order-detail__quantity-control">
                        <div class="input-group">
                            <input id="basketQuantityInput<?=$item->product_id;?>" type="text" class="form-control order-detail__quantity-input" data-old-value="<?=$item['quantity']?>" value="<?=$item['quantity']?>">
                            <span class="input-group-btn">
                                <button id="basketQuantityBtn" data-id="<?=$item->product_id;?>" class="btn btn-default" type="button">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    </td>
                    <td><?=number_format($item->price * $item->quantity, 2)?></td>
                    <td><?=$item->date_insert?></td>
                    <td>
                        <a href="<?=Url::toRoute(['order/deletep-item'], ['id' => $item->id]);?>">
                            <i class="basket-table__remove-btn-icon far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php $this->registerJsFile('@web/js/admin/order/detail.js'); ?>
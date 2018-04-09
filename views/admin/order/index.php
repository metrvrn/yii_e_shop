<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<div class="row">
    <div class="col-xs-12">
        <h3>Заказы</h3>
        <?php if(!empty($orders)) : ?>
            <table class="table-bordered order-index__table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Телефон</th>
                        <th>Рабочий телефон</th>
                        <th>Email</th>
                        <th>Компания</th>
                        <th>Доставка</th>
                        <th>Адресс</th>
                        <th>Оплата</th>
                        <th>Товаров</th>
                        <th>Сумма</th>
                        <th>Оформлен</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($orders as $order) : ?>
                            <tr onclick="window.location='<?=Url::toRoute(['admin/order/detail']);?>'">
                                <td><?=$order->id;?></td>
                                <td><?=$order->user_name;?></td>
                                <td><?=$order->user_surname;?></td>
                                <td><?=$order->user_phone;?></td>
                                <td><?=$order->user_workphone;?></td>
                                <td><?=$order->user_email;?></td>
                                <td><?=$order->user_company;?></td>
                                <td><?=$order->delivery_name;?></td>
                                <td class="nopadding">
                                    <div class="order-index__address-wrap clearfix">
                                        <div class="pull-left">Город:</div>
                                        <div class="pull-right">
                                            <?=$order->delivery_city ? $order->delivery_city : "-"?>
                                        </div>
                                    </div>
                                    <div class="order-index__address-wrap clearfix">
                                        <div class="pull-left">Улица:</div>
                                        <div class="pull-right">
                                            <?=$order->delivery_street ? $order->delivery_street : "-"?>
                                        </div>
                                    </div>
                                    <div class="order-index__address-wrap clearfix">
                                        <div class="pull-left">Дом:</div>
                                        <div class="pull-right">
                                            <?=$order->delivery_house_number ? $order->delivery_house_number : "-"?>
                                        </div>
                                    </div>
                                    <div class="order-index__address-wrap clearfix">
                                        <div class="pull-left">Квартира/Оффис:</div>
                                        <div class="pull-right">
                                            <?=$order->delivery_office_number ? $order->delivery_office_number : "-"?>
                                        </div>
                                    </div>
                                </td>
                                <td><?=$order->payment_name;?></td>
                                <td><?=$order->products_number;?></td>
                                <td><?=$order->sum;?></td>
                                <td class="order-index__date-cell"><?=date("Y-m-d \n H:i:s", $order->created_at);?></td>
                            </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?=LinkPager::widget([
                'pagination' => $page
            ]);?>
        <?php else : ?>
        <p class="bg-danger">Заказов нет</p>
        <?php endif; ?>
    </div>
</div>
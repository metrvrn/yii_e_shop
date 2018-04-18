<?php

?>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; margin:0; padding:0; width: 100%; max-width="600px" font-size: 16px;">
    <thead>
        <tr>
            <th colspan="2" stype="padding: 10px; border: 1px solid #aaaaaa;">
                <h3>Оформлен новый заказ № <?=$order->id;?></h3>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th style="padding: 10px; border: 1px solid #aaaaaa;" colspan="2">Клиент</th>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #aaaaaa;">Имя</td>
            <td style="padding: 10px; border: 1px solid #aaaaaa; "><?=$order->user_name ? $order->user_name : "-";?></td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #aaaaaa;">Фамилия</td>
            <td style="padding: 10px; border: 1px solid #aaaaaa;"><?=$order->user_surname ? $order->user_surname : "-"?></td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #aaaaaa;">Отчество</td>
            <td style="padding: 10px; border: 1px solid #aaaaaa;"><?=$order->user_patronymic ? $order->user_patronymic : "-"?></td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #aaaaaa;">Телефон</td>
            <td style="padding: 10px; border: 1px solid #aaaaaa;"><?=$order->user_phone ? $order->user_phone : "-"?></td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #aaaaaa;">Рабочий телефон</td>
            <td style="padding: 10px; border: 1px solid #aaaaaa;"><?=$order->user_workphone ? $order->user_workphone : "-"?></td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #aaaaaa;">Email</td>
            <td style="padding: 10px; border: 1px solid #aaaaaa;"><?=$order->user_email ? $order->user_email : "-"?></td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #aaaaaa;">Компания</td>
            <td style="padding: 10px; border: 1px solid #aaaaaa;"><?=$order->user_company ? $order->user_company : "-"?></td>
        </tr>
        <tr>
            <th style="padding: 10px; border: 1px solid #aaaaaa;" colspan="2">Доставка</th>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #aaaaaa;">Тип доставки</td>
            <td style="padding: 10px; border: 1px solid #aaaaaa;"><?=$order->delivery_name ? $order->delivery_name : "-"?></td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #aaaaaa;">Город</td>
            <td style="padding: 10px; border: 1px solid #aaaaaa;"><?=$order->delivery_city ? $order->delivery_city : "-"?></td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #aaaaaa;">Улица</td>
            <td style="padding: 10px; border: 1px solid #aaaaaa;"><?=$order->delivery_street ? $order->delivery_street : "-"?></td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #aaaaaa;">Дом</td>
            <td style="padding: 10px; border: 1px solid #aaaaaa;"><?=$order->delivery_house_number ? $order->delivery_house_number : "-"?></td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #aaaaaa;">Квартира</td>
            <td style="padding: 10px; border: 1px solid #aaaaaa;"><?=$order->delivery_office_number ? $order->delivery_office_number : "-"?></td>
        </tr>
        <tr>
            <th style="padding: 10px; border: 1px solid #aaaaaa;" colspan="2">Оплата</th>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #aaaaaa;">Тип оплаты</td>
            <td style="padding: 10px; border: 1px solid #aaaaaa;"><?=$order->payment_name ? $order->payment_name : "-"?></td>
        </tr>
        <tr>
            <th style="padding: 10px; border: 1px solid #aaaaaa;" colspan="2">Товары</th>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #aaaaaa;">Наименований</td>
            <td style="padding: 10px; border: 1px solid #aaaaaa;"><?=$order->products_number ? $order->products_number : "-"?></td>
        </tr>
        <tr>
            <td style="padding: 10px; border: 1px solid #aaaaaa;">Сумма</td>
            <td style="padding: 10px; border: 1px solid #aaaaaa;"><?=$order->sum ? $order->sum : "-"?></td>
        </tr>
    </tbody>
</table>

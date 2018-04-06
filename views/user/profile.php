<?php
use yii\helpers\Url;
?>



<div class="row">
    <div class="col-xs-9">
        <h3>Профиль пользователя</h3>
        <table class="table-bordered user-profile-table">
            <tr>
                <td>Имя</td>
                <td><?=$user->name ? $user->name : "-";?></td>
            </tr>
            <tr>
                <td>Фамилия</td>
                <td><?=$user->surname ? $user->surname : "-";?></td>
            </tr>
            <tr>
                <td>Отчество</td>
                <td><?=$user->patronymic ? $user->patronymic : "-";?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?=$user->email ? $user->email : "-";?></td>
            </tr>
            <tr>
                <td>Телефон</td>
                <td><?=$user->phone ? $user->phone : "-";?></td>
            </tr>
            <tr>
                <td>Рабочий телефон</td>
                <td><?=$user->work_phone ? $user->work_phone : "-";?></td>
            </tr>
            <tr>
                <td>Компания</td>
                <td><?=$user->company ? $user->company : "-";?></td>
            </tr>
            <tr>
                <td>Город</td>
                <td><?=$user->city ? $user->city : "-";?></td>
            </tr>
            <tr>
                <td>Улица</td>
                <td><?=$user->street ? $user->street : "-";?></td>
            </tr>
            <tr>
                <td>Дом</td>
                <td><?=$user->house_number ? $user->house_number : "-";?></td>
            </tr>
            <tr>
                <td>Квартира/Оффис</td>
                <td><?=$user->office_number ? $user->office_number : "-";?></td>
            </tr>
        </table>
        <div class="clearfix user-profile__btn-wrap">
            <div class="pull-right">
                <a class="user-profile__pass-btn" href="<?=Url::toRoute("user/change-password")?>">Изменить пароль</a>
                <a class="user-profile__edit-btn" href="<?=Url::toRoute("user/edit-profile");?>">Редактировать профиль</a>
            </div>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="user-profile-sidepanel__wrap">
            <div class="user-profile-sidepanel">
                <ul class="user-profile-sidepanel__list">
                    <li class="user-profile-sidepanel__elem">
                        <a href="<?=Url::toRoute('user/orders');?>" class="user-profile-sidepanel__link">Заказы</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
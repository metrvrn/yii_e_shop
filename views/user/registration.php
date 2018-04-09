<?php
use yii\helpers\Url;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="registration__title-wrapper">
            <h3>Регистрация</h3>
        </div>
    </div>
    <form action="<?=Url::toRoute('user/registration')?>" method="POST">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>">
        <div class="col-xs-6">
            <div class="form-group">
            <input autocomplete="off" name="email" type="text" class="form-control" placeholder="Email" value="<?=isset($user->email) ? $user->email : "";?>">
            </div>
            <div class="form-group">
                <input autocomplete="off" name="password" type="password" class="form-control" placeholder="Пароль">
            </div>
            <div class="form-group">
                <input autocomplete="off" name="confirm_password" type="password" class="form-control" placeholder="Повторите пароль">
            </div>
            <div class="form-group">
                <input autocomplete="off" name="name" type="text" class="form-control" placeholder="Имя" value="<?=isset($user->name) ? $user->name : "";?>">
            </div>
            <div class="form-group">
                <input autocomplete="off" name="surname" type="text" class="form-control" placeholder="Фамилия" value="<?=isset($user->surname) ? $user->surname : "";?>">
            </div>
            <div class="form-group">
                <input autocomplete="off" name="patronymic" type="text" class="form-control" placeholder="Отчество" value="<?=isset($user->patronymic) ? $user->patronymic : "";?>">
            </div>
            <div class="form-group">
                <input autocomplete="off" name="company" type="text" class="form-control" placeholder="Компания" value="<?=isset($user->company) ? $user->company : "";?>">
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <input autocomplete="off" name="phone" type="text" class="form-control" placeholder="Телефон" value="<?=isset($user->phone) ? $user->phone : "";?>">
            </div>
            <div class="form-group">
                <input autocomplete="off" name="work_phone"type="text" class="form-control" placeholder="Рабочий телефон" value="<?=isset($user->wrork_phone) ? $user->work_phone : "";?>">
            </div>
            <div class="form-group">
                <input autocomplete="off" name="city"type="text" class="form-control" placeholder="Город" value="<?=isset($user->city) ? $user->city : "";?>">
            </div>
            <div class="form-group">
                <input autocomplete="off" name="street" type="text" class="form-control" placeholder="Улица" value="<?=isset($user->street) ? $user->street : "";?>">
            </div>
            <div class="form-group">
                <input autocomplete="off" name="house_number"type="text" class="form-control" placeholder="Дом/Строение" value="<?=isset($user->house_number) ? $user->house_number : "";?>">
            </div>
            <div class="form-group">
                <input autocomplete="off" name="office_number" type="text" class="form-control" placeholder="Квартира/Оффис" value="<?=isset($user->office_number) ? $user->office_number : "";?>">
            </div>
        </div>
        <div class="pull-right">
            <input class="btn btn-primary" type="submit" value="Регистрация">
            <a class="btn btn-danger" href="<?=Url::home();?>">Отмена</a> 
        </div>  
    </form>
</div>
<?php $this->registerJsFile('@web/js/user/registration.js'); ?>
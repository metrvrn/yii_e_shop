<?php
use yii\helpers\Url;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="registration__title-wrapper">
            <h3>Регистрация</h3>
        </div>
    </div>
    <form action="<?=Url::toRoute('user/registration')?>">
        <div class="col-xs-6">
            <div class="form-group">
            <input name="email" type="text" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <input name="password" type="text" class="form-control" placeholder="Пароль">
            </div>
            <div class="form-group">
                <input name="confirm_password" type="text" class="form-control" placeholder="Повторите пароль">
            </div>
            <div class="form-group">
                <input name="name" type="text" class="form-control" placeholder="Имя">
            </div>
            <div class="form-group">
                <input name="surname" type="text" class="form-control" placeholder="Фамилия">
            </div>
            <div class="form-group">
                <input name="patronymic" type="text" class="form-control" placeholder="Отчество">
            </div>
            <div class="form-group">
                <input name="company" type="text" class="form-control" placeholder="Компания">
            </div>
            </div>
        <div class="col-xs-6">
            <div class="form-group">
                <input name="phone" type="text" class="form-control" placeholder="Телефон">
            </div>
            <div class="form-group">
                <input name="work_phone"type="text" class="form-control" placeholder="Рабочий телефон">
            </div>
            <div class="form-group">
                <input name="city"type="text" class="form-control" placeholder="Город">
            </div>
            <div class="form-group">
                <input name="street" type="text" class="form-control" placeholder="Улица">
            </div>
            <div class="form-group">
                <input name="house_number"type="text" class="form-control" placeholder="Дом/Строение">
            </div>
            <div class="form-group">
                <input name="office_number" type="text" class="form-control" placeholder="Квартира/Оффис">
            </div>
        </div>
        <div class="pull-right">
            <input class="btn btn-primary" type="summit" value="Регистрация">
            <a class="btn btn-danger" href="<?=Url::home();?>">Отмена</a> 
        </div>  
    </form>
</div>
<?php $this->registerJsFile('@web/js/user/registration.js'); ?>
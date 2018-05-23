<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<div class="row">
    <div class="col-xs-4 col-xs-offset-4">
        <div class="registration__title-wrapper">
            <h3>Регистрация</h3>
        </div>
        <?php $form = ActiveForm::begin(); ?>
        <?php $form->fieldConfig = ['inputOptions' => ['autocomplete' => 'off', 'class' => 'form-control']]; ?>
            <?= $form->field($user, 'email')->label('Email'); ?>
            <?= $form->field($user, 'password')->label('Пароль'); ?>
            <?= $form->field($user, 'confirm_password')->label('Подтверждение пароля'); ?>
            <?= $form->field($user, 'name')->label('Имя'); ?>
            <?= $form->field($user, 'surname')->label('Фамилия'); ?>
            <?= $form->field($user, 'phone')->label('Телефон'); ?>
            <?= $form->field($user, 'work_phone')->label('Рабочий телефон'); ?>
            <?= $form->field($user, 'city')->label('Город'); ?>
            <?= $form->field($user, 'street')->label('Улица'); ?>
            <?= $form->field($user, 'house_number')->label('Дом'); ?>
            <?= $form->field($user, 'office_number')->label('Офис\\Квартира'); ?>
            <?= $form->field($user, 'company')->label('Компания'); ?>     
            <div class="form-group">
                <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary']);?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php $this->registerJsFile('@web/js/user/registration.js'); ?>
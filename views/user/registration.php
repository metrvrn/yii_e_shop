<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="registration__title-wrapper">
            <h3>Регистрация</h3>
        </div>
    </div>
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($user, 'email', ['template' => '{input}{error}'])->textInput(['class' => 'Email']); ?>
        <?= $form->field($user, 'password'); ?>
        <?= $form->field($user, 'confirm_password'); ?>
        <?= $form->field($user, 'name'); ?>
        <?= $form->field($user, 'surname'); ?>
        <?= $form->field($user, 'patronymic'); ?>
        <?= $form->field($user, 'phone'); ?>
        <?= $form->field($user, 'work_phone'); ?>
        <?= $form->field($user, 'city'); ?>
        <?= $form->field($user, 'street'); ?>
        <?= $form->field($user, 'house_number'); ?>
        <?= $form->field($user, 'office_number'); ?>
        <?= $form->field($user, 'company'); ?>     
        <div class="form-group">
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary']);?>
        </div>
    <?php ActiveForm::end(); ?>
    
</div>
<?php $this->registerJsFile('@web/js/user/registration.js'); ?>
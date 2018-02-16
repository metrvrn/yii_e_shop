<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<pre>
    <?php print_r($user); ?>
</pre>
<div class="col-xs-4 col-xs-offset-4">
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($user, 'email'); ?>
        <?= $form->field($user, 'password'); ?>
        <?= $form->field($user, 'name'); ?>
        <?= $form->field($user, 'surname'); ?>
        <?= $form->field($user, 'patronymic');?>
        <?= $form->field($user, 'phone'); ?>
        <?= $form->field($user, 'work_phone'); ?>
        <?= $form->field($user, 'city'); ?>
        <?= $form->field($user, 'street'); ?>
        <?= $form->field($user, 'house_number'); ?>
        <?= $form->field($user, 'office_number'); ?>
        <div class="form-group ">
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<div class="col-xs-4 col-xs-offset-4">
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($loginForm, 'email'); ?>
        <?= $form->field($loginForm, 'password'); ?>
        <?= $form->field($loginForm, 'rememberMe')->checkbox(); ?>
        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary']); ?>
    <?php ActiveForm::end(); ?>
</div>

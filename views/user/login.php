<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="col-xs-6 col-xs-offset-3">
    <div class="user-login__align">
        <div class="user-login__wrap">
            <h3 class="user-login__title">Вход</h3>
            <?php if($error): ?>
                <p>Email или пароль введены неверно</p>
            <?php endif; ?>
            <form class="user-login__form" action="<?=Url::toRoute(['user/login']);?>" method="POST">
                <input type="hidden" name="<?=Yii::$app->request->csrfParam;?>" value="<?=Yii::$app->request->csrfToken;?>">
                <input class="user-login__text-input" type="text" name="email" placeholder="Email" autocomplete="off">
                <input class="user-login__text-input" type="password" name="password" placeholder="Пароль" autocomplete ="off">
                <div class="clearfix">
                    <input class="user-login__submit pull-right" type="submit" value="Войти">
                </div>
            </form>
        </div>
    </div>
</div>

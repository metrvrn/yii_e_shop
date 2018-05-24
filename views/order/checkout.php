<?php
use yii\helpers\Url;
?>
<form action="<?= Url::toRoute('order/checkout') ?>" method="POST">
<div class="row">
    <div class="col-xs-4">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>">
        <div class="order-panel">
            <div class="order-panel__title-wrap">
                <span class="order-panel-title">Контактные данные</span>
            </div>
            <div class="form-group">
                <input required name="user_name" type="text" class="form-control" placeholder="Имя" value="<?= $user['name'] ? $user['name'] : ''; ?>">
            </div>
            <div class="form-group">
                <input name="user_surname" type="text" class="form-control" placeholder="Фамилия" value="<?= $user['surname'] ? $user['surname'] : ''; ?>">
            </div>
            <div class="form-group">
                <input name="user_patronymic" type="text" class="form-control" placeholder="Отчество" value="<?= $user['patronymic'] ? $user['patronymic'] : ''; ?>">
            </div>
            <div class="form-group">
                <input name="user_company" type="text" class="form-control" placeholder="Организация" value="<?= $user['company'] ? $user['company'] : ''; ?>">
            </div>
            <div class="form-group">
                <input required name="user_phone" type="text" class="form-control" placeholder="Телефон" value="<?= $user['phone'] ? $user['phone'] : ''; ?>">
            </div>
            <div class="form-group">
                <input name="user_workphone" type="text" class="form-control" placeholder="Рабочий телефон" value="<?= $user['work_phone'] ? $user['work_phone'] : ''; ?>">
            </div>
            <div class="form-group">
                <input name="user_email" type="text" class="form-control" placeholder="E-mail" value="<?= $user['email'] ? $user['email'] : ''; ?>">
            </div>
        </div>
        
    </div>
    <div class="col-xs-4">
    <div class="order-panel">
            <?php if (!empty($deliveries)) : ?>
                <div class="order-panel__title-wrap">
                    <span class="order-panel__title">Доставка</span>
                </div>
                <div class="form-group">
                    <select required name="delivery" class="form-control">
                        <?php foreach ($deliveries as $delivery) : ?>
                            <option value="<?= $delivery->id ?>">
                                <b><?= $delivery->name; ?></b>
                                <p><?= $delivery->description; ?></p>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php else : ?>
            <?php endif; ?>
            <div id="addressInputsContainer">
                <div class="form-group">
                    <input name="delivery_city" type="text" class="form-control" placeholder="Город" value="<?= $user['city'] ? $user['city'] : ''; ?>">
                </div>
                <div class="form-group">
                    <input name="delivery_street" type="text" class="form-control" placeholder="Улица" value="<?= $user['street'] ? $user['street'] : ''; ?>">
                </div>
                <div class="form-group">
                    <input name="delivery_house_number" type="text" class="form-control" placeholder="Строение\Корпус" value="<?= $user['house_number'] ? $user['house_number'] : ''; ?>">
                </div>
                <div class="form-group">
                    <input name="delivery_office_number" type="text" class="form-control" placeholder="Квартира\Оффис" value="<?= $user['office_number'] ? $user['office_number'] : ''; ?>">
                </div>
            </div>
        </div>
        <?php if (!empty($payments)) : ?>
            <div class="order-panel">
                <div class="order-panel__title-wrap">
                    <span class="order-panel__title">Оплата</span>
                </div>
                <div class="form-group">
                    <select required name="payment" class="form-control">
                    <?php foreach ($payments as $payment) : ?>
                        <option value="<?= $payment->id ?>">
                            <b><?= $payment->name ?></b>
                            <p><?= $payment->description ?></p>
                        </option>
                    <?php endforeach; ?>                            
                    </select>
                </div>
            </div>
        <?php else : ?>

        <?php endif; ?>
    </div>
    <div class="col-xs-4">
        <div class="order-checkout__sidepanel-wrap">
            <div class="order-checkout__sidepanel">
                <div class="order-checkout__sidepanel-title-wrap">
                    <h3 class="order-checkout__sidepanel-title">
                        Заказ
                    </h3>
                </div>
                <div class="basket-sidepanel__separator"></div>
                <div class="order-checkout__sidepanel-info-wrap">
                    <table class="basket-sidepanel__table table-bordered">
                        <tr>
                            <td>Наименований</td>
                            <td><?= $basketQuantity ?></td>
                        </tr>
                        <tr>
                            <td>Сумма заказа</td>
                            <td><?= $basketSum ?></td>
                        </tr>
                    </table>
                </div>
                <div class="order-checkout__submit-wrap">
                    <input class="order-checkout__submit" type="submit" value="Оформить">
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<?php $this->registerJsFile("@web/js/order/checkout.js"); ?>
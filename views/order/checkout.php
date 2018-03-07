<?php
?>

<div class="row">
    <div class="col-xs-7">
        <form>
            <div class="order-panel">
                <div class="order-panel__title-wrap">
                    <span class="order-panel-title">Контактные данные</span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Имя" value="<?=$user['name'] ? $user['name'] : '';?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Фамилия" value="<?=$user['surname'] ? $user['surname'] : '';?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Отчество" value="<?=$user['patronymic'] ? $user['patronymic'] : '';?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Организация value="<?=$user['name'] ? $user['name'] : '';?>"">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Телефон" value="<?=$user['phone'] ? $user['phone'] : '';?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Рабочий телефон" value="<?=$user['work_phone'] ? $user['work_phone'] : '';?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="E-mail" value="<?=$user['email'] ? $user['email'] : '';?>">
                </div>
            </div>
            <div class="order-panel">
                <div class="order-panel__title-wrap">
                    <span class="order-panel__title">Доставка</span>
                </div>
                <div class="checkbox">
                    <label>
                        <input id="pickupCheckbox" type="checkbox">Самовывоз
                    </label>
                </div>
                <div id="addressInputsContainer">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Город" value="<?=$user['city'] ? $user['city'] : '';?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Улица" value="<?=$user['street'] ? $user['street'] : '';?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Строение\Корпус" value="<?=$user['house_number'] ? $user['house_number'] : '';?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Квартира\Оффис" value="<?=$user['office_number'] ? $user['office_number'] : '';?>">
                    </div>
                </div>
            </div>
            <div class="order-panel">
                <div class="order-panel__title-wrap">
                    <span class="order-panel__title">Оплата</span>
                </div>
                <div class="form-group">
                    <select name="payment">
                        <option value="">Наличные</option>
                        <option value="">Безнал</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-default">Оформить</button>
        </form>
    </div>
    <div class="col-xs-5">
        <div class="order-checkout__sidepanel">
            
        </div>
    </div>
</div>
<?php $this->registerJsFile("@web/js/order/checkout.js");?>
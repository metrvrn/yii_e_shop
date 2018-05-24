<?php
use yii\helpers\Url;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">Профиль пользователя</div>
            <div class="panel-body">
                <form action="<?=Url::toRoute(['user/detail', 'id' => $user->id])?>">
                    <div class="form-group">
                        <label for="userName">Имя</label>
                        <input type="text" class="form-control" id="userName" value="<?=$user->name ? $user->name : ""?>">
                    </div>
                    <div class="form-group">
                        <label for="userSurname">Фамилия</label>
                        <input type="text" class="form-control" id="userSurname" value="<?=$user->surname ? $user->surname : ""?>">
                    </div>
                    <div class="form-group">
                        <label for="userPatronymic">Отчество</label>
                        <input type="text" class="form-control" id="userPatronymic" value="<?=$user->patronymic ? $user->patronymic : ""?>">
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Email</label>
                        <input type="text" class="form-control" id="userEmail" value="<?=$user->email ? $user->email : ""?>">
                    </div>
                    <div class="form-group">
                        <label for="userPhone">Телефон</label>
                        <input type="text" class="form-control" id="userPhone" value="<?=$user->phone ? $user->phone : "" ?>">
                    </div>
                    <div class="form-group">
                        <label for="userWorkphone">Рабочий телефон</label>
                        <input type="text" class="form-control" id="userWorkphone" value="<?=$user->work_phone ? $user->work_phone : ""?>">
                    </div>
                    <div class="form-group">
                        <label for="userCompany">Компания</label>
                        <input type="text" class="form-control" id="userCompany" value="<?=$user->company ? $user->company : ""?>">
                    </div>
                    <div class="form-group">
                        <label for="userCity">Город</label>
                        <input type="text" class="form-control" id="userCity" value="<?=$user->city ? $user->city : ""?>">
                    </div>
                    <div class="form-group">
                        <label for="userStreet">Улица</label>
                        <input type="text" class="form-control" id="userStreet" value="<?=$user->street ? $user->street : ""?>">
                    </div>
                    <div class="form-group">
                        <label for="userHouse">Дом</label>
                        <input type="text" class="form-control" id="userHouse" value="<?=$user->house_number ? $user->house_number : ""?>">
                    </div>
                    <div class="form-group">
                        <label for="userOffice">Квартира/Офис</label>
                        <input type="text" class="form-control" id="userOffice" value="<?=$user->office_number ? $user->office_number : ""?>">
                    </div>
                    <select name="price_id" id="" class="form-control">
                        <?php foreach($priceTypes as $p) : ?>
                            <option <?=$p->id == $user->price_id ? "selected" : ""?> value="<?=$p->id;?>"><?=$p->name;?></option>
                        <?php endforeach;?>
                    </select>

                <!-- <div class="form-group">
                    <label for="exampleInputEmail1"></label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div> -->
                    <div class="clearfix">
                        <div class="pull-right">
                            <input class="btn btn-danger" type="reset" value="Сброс">
                            <input class="btn btn-primary" type="submit" value="Сохранить">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
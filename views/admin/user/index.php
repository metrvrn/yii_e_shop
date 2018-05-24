<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<?php if(!empty($users)) : ?>
    <div class="row">
        <div class="col-xs-12">
            <table class="table-bordered user-index-table table-hover">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Отчество</th>
                        <th>Email</th>
                        <th>Телефон</th>
                        <th>Рабочий телефон</th>
                        <th>Компания</th>
                        <th>Город</th>
                        <th>Улица</th>
                        <th>Дом</th>
                        <th>Кваритра/Офис</th>
                        <th>Тип цены</th>
                        <th>Группа</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user) : ?>
                        <tr onclick="window.location='<?=Url::toRoute(['admin/user/detail', 'id' => $user->id]);?>'">
                            <td><?=$user->id;?></td>
                            <td><?=$user->name;?></td>
                            <td><?=$user->surname;?></td>
                            <td><?=$user->patronymic;?></td>
                            <td><?=$user->email;?></td>
                            <td><?=$user->phone;?></td>
                            <td><?=$user->work_phone;?></td>
                            <td><?=$user->company;?></td>
                            <td><?=$user->city;?></td>
                            <td><?=$user->street;?></td>
                            <td><?=$user->house_number;?></td>
                            <td><?=$user->office_number;?></td>
                            <td><?=$user->priceType->name;?></td>
                            <td><?=$user->id;?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?=LinkPager::widget([
                'pagination' => $pagination
            ]);?>
        </div>
    </div>
<?php endif; ?>
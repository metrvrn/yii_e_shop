<?php
use yii\widgets\Pjax;
?>

<?php Pjax::begin(); ?>
    <a href="?r=admin/catalog/upload" class="btn btn-primary">Обновить</a>
    <p><?= $test ?></p>
<?php Pjax::end(); ?>

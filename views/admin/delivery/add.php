<?php
use yii\helpers\Url;
?>

<?php if (!empty($errors)) : ?>
    <p class="bg-danger">
        <?php foreach ($errors as $error) : ?>
            <span><?php print_r($error); ?><br></span>
        <?php endforeach; ?>
    </p>
<?php endif; ?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Новая доставка</h3>
  </div>
  <div class="panel-body">
    <form action="<?= Url::toRoute('admin/delivery/add'); ?>" method="POST">
        <div class="clearfix">
            <div class="form-group">
                <input name="name" class="form-control" type="text" placeholder="Название" autocomplete="off">
            </div>
            <div class="form-group">
                <textarea name="description" class="form-control" type="textarea" placeholder="Описание"></textarea>
            </div>
            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>">
            <div class="form-group clearfix">
                <div class="pull-right">
                    <input class="btn btn-danger" type="reset" value="Отмена">
                    <input class="btn btn-primary" type="submit" value="Сохранить">
                </div>
            </div>
        </div>
    </form>
  </div>
</div>
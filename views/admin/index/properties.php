<?php
use yii\helpers\Url;
?>

<?php if(!empty($properties)) : ?>
    <form action="<?=Url::toRoute('admin/index/properties');?>" method="POST">
        <?php foreach($properties as $property) : ?>
        <div class="form-group">
            <label for="exampleInputEmail1"><?=$property->name;?></label>
            <textarea name="<?=$property->code;?>" type="email" class="form-control" id="exampleInputEmail1"><?=$property->data;?></textarea>
        </div>
        <?php endforeach; ?>
        <div class="clearfix pull-right">
            <input class="btn btn-primary" type="submit" value="Сохранить">
            <input class="btn btn-danger" type="reset" value="Отмена">
        </div>
    </form>
<?php endif;?>
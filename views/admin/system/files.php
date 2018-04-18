<?php
use yii\helpers\Url;
?>

<div class="row">
    <div class="col-xs-10 admin-files-top-row">
        <div class="input-group">
        <div class="input-group-btn">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Все <span class="caret"></span></button>
            <ul class="dropdown-menu">
            <li><a href="#">Все</a></li>
            </ul>
        </div><!-- /btn-group -->
        <input type="text" placeholder="Найти" class="form-control" aria-label="...">
        </div><!-- /input-group -->
    </div>
    <div class="col-xs-2">
        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Загрузить файлы</button>
    </div>  
</div>

<!-- <div class="row">
   <div class="col-xs-12">
        <table class="table table-bordered">
            <th>
                <td>Превью</td>
                <td>Имя</td>
                <td>Тип</td>
                <td>Действие</td>
            </th>
            <tbody>
                
            </tbody>
        </table>
   </div>
</div> -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="<?=Url::toRoute('admin/system/upload-files');?>" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Загрузка файлов</h4>
        </div>
        <div class="modal-body">
            <input type="file" name="files" palceholder="Выберете один или несколько фалов" multiple>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Отмена">
            <input type="submit" class="btn btn-primary" value="Загрузить">
        </div>
      </form>
    </div>
  </div>
</div>


    

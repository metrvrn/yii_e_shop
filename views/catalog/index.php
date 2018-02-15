<?php
use yii\helpers\Url;
?>

<?php if(!empty($sections)): ?>
    <?php foreach($sections as $section): ?>
        <div class="col-xs-3">
            <div class="catalog-index-section">
                <a href="<?=Url::toRoute(['catalog/main', 'section' => $section['section_id']]);?>" class="catalog-index-section__link">
                    <div class="catalog-index-section__image">
                        <img src="" alt="">
                    </div>
                    <h4><?=$section['name']?></h4>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
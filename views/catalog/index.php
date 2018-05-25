<?php
use yii\helpers\Url;
?>

<?php if(!empty($sections)): ?>
    <?php foreach($sections as $section): ?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="catalog-index-section">
                <a href="<?=Url::toRoute(['catalog/main', 'section' => $section['id']]);?>" class="catalog-index-section__link">
                    <div class="catalog-index-section__image">
                        <img class="img-reponse" src="" alt="">
                    </div>
                    <div class="catalog-index-section__name">
                        <span class="catalog-index-section__name-text">
                            <?=$section['name'];?>
                        </span>
                    </div>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
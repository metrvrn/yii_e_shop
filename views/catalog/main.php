<?php
use yii\helpers\Url;
?>

<div class="col-xs-3 no-padding">
    <?php if(!empty($sections)): ?>
        <ul class="catalog-sections-list">
            <?php foreach($sections as $section): ?>
                <li class="catalog-sections-list__elem">
                    <a href="<?=Url::toRoute(['catalog/main', 'section' => $section['section_id']]);?>" class="catalog-sections-list__link"><?=$section['name'];?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
<div class="col-xs-9">
    <div class="row">
        <?php if(!empty($products)): ?>
            <?php foreach($products as $product): ?>
                <div class="col-xs-4">
                    <div class="product-cart">
                        <a href="<?=Url::toRoute(['catalog/detail', 'id' => $product['product_id']])?>" class="product-cart__link">
                            <div class="product-cart__image-container">
                                <img src="" alt="Картинка товара" class="product-cart_image">
                            </div>
                            <div class="product-cart__info">
                                <div class="product-cart__title-wrap">
                                    <span class="product-cart__title">
                                        <?=$product['name']?>
                                    </span>
                                </div>
                            </div>
                        </a> 
                        <div class="product-cart__controls-wrap">
                            <div class="product-cart__controls">
                                <input type="text" class="product-cart__quantity-input">
                                <bnt class="product-cart__basket-btn">В корзину</bnt>
                            </div>
                        </div>   
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<?php $this->registerJsFile('@web/js/catalog/main.js'); ?>

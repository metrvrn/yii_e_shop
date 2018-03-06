<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
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
                <div class="col-lg-4 col-sm-6 col-xs-12">
                    <div class="product-cart">
                        <a href="<?=Url::toRoute(['catalog/detail', 'id' => $product['product_id']])?>" class="product-cart__link">
                            <div class="product-cart__image-container">
                                <img src="<?=$product->image['url'];?>" alt="Картинка товара" class="product-cart_image img-responsive">
                            </div>
                            <div class="product-cart__info-wrap">
                                <span class="poduct-cart__info">
                                    <?=$product['name'];?>
                                </span>
                            </div>
                        </a>
                        <div class="product-cart__bottom">
                            <div class="product-cart__bottom-info clearfix">
                                <div class="product-cart__price-wrap">
                                    <span class="product-cart__price">
                                        <?=$product->price['value'];?>
                                    </span>
                                    <span class="product-cart__price-ruble">&#8381;</span>
                                </div>
                                <div class="product-cart__quantity-wrap">
                                    <span class="product-cart__quantity-text">Остатки:</span>
                                    <span class="product-cart__quantity">
                                        <?=$product->quantity['value'];?>
                                    </span>
                                </div>
                            </div>
                            <div class="product-cart__controls-wrap">
                                <div class="product-cart__controls clearfix" id="<?=$product['product_id']?>">
                                    <button data-action="minus_btn"  class="product-cart__quantity-btn product-cart__btn--minus">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input data-action="quantity_input" type="text" class="product-cart__quantity-input" value="1">
                                    <button data-action="plus_btn" class="product-cart__quantity-btn product-cart__btn--plus">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <button data-action="add_btn" class="product-cart__basket-btn">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <?php
         echo LinkPager::widget([
            'pagination' => $pagination
        ]); 
    ?>
</div>
<?php $this->registerJsFile('@web/js/catalog/main.js'); ?>

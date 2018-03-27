<?php

?>

<div class="row">
    <div class="col-xs-4">
        <div class="detail-product__image-wrap">
            <img class="detail-product__image" src="<?=$product->image['url'];?>" alt="">
        </div>
    </div>
    <div class="col-xs-5">
        <div class="detail-product__title-wrap">
            <h3 class="detail-product__title"><?=$product['name']?></h3>
        </div>
        <div class="detail-product__description-wrap">
            <span class="detail-product__description">
                <?php if(isset($product->detail_text)) : ?>
                    <?=$product->detail_text?>
                <?php else : ?>
                    <?=$product->preview_text?>
                <?php endif; ?>
            </span>
        </div>
        <?php if(isset($product->properties)) : ?>
            <div class="detail-product__property-wrap">
                <table class="detail-product__property-table">
                    <tbody>
                        <?php foreach($product->properties as $property) : ?>
                            <tr>
                                <td><?=$property->type->name;?>:</td>
                                <td><?=$property->value;?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-xs-3 pull-right">
        <div class="detail-products__controls-wrap">
            <div class="detail-product__controls">
                <div class="detail-product__inputs-wrap clearfix">
                    <button class="detail-product__btn detail-product__btn-minus">
                        <i class="fas fa-minus"></i>
                    </button>
                    <input type="text" class="detail-product__quantity-input" value=0>
                    <button class="detail-product__btn detail-product__btn-plus">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <button class="detail-product__basket-btn">
                    <i class="fas fa-cart-plus"></i>
                </button>
            </div>
        </div>
    </div>
</div>

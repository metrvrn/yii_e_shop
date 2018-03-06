<?php

?>

<div class="col-xs-4">
    <div class="detail-product__image-wrap">
        <img src="<?=$product->image['url'];?>" alt="">
    </div>
</div>
<div class="col-xs-8">
    <div class="detail-product__title-wrap">
        <h3 class="detail-product__title"><?=$product['name']?></h3>
    </div>
    <div class="detail-product__description-wrap">
        <span class="detail-product__description"><?=$product['description'];?></span>
    </div>
    <div class="detail-product__property-wrap">
        <table class="detail-product__property-table">
            <?php ?>
            
        </table>
    </div>
</div>
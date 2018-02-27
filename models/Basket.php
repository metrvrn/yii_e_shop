<?php

namespace app\models;

use yii\db\ActiveRecord;


class Basket extends ActiveRecord
{

    // public $id;
    // public $b_user_id;
    // public $order_id;
    // public $product_id;
    // public $price;
    // public $quantity;
    // public $date_insert;
    // public $date_update;

    public static function tableName()
    {
        return 'basket';
    }

    public function rules()
    {
        return [
            [['b_user_id', 'product_id', 'price', 'quantity', 'name'], 'required']
        ];
    }

    
}
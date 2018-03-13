<?php

namespace app\models\sale;

use yii\db\ActiveRecord;
use Yii;
use app\models\sale\BasketUser;

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

    public static function getQuantity()
    {

        return static::find()->where([
            'b_user_id' => BasketUser::getBasketKey(),
            'order_id' => null
        ])->count();
    }

    public static function getSum()
    {
        $basketItems = static::find()->where([
            'b_user_id' => BasketUser::getBasketKey(),
            'order_id' => null
        ])->all();
        $sum = 0;
        foreach($basketItems as $item){
            $sum += $item['price'] * $item['quantity'];
        }
        return number_format($sum, 2);
    }

    
}
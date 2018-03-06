<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;


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
        $basketUser = Yii::$app->session['b_user'];
        if(!$basketUser){
            return 0;
        }
        return static::find()->where([
            'b_user_id' => $basketUser,
            'order_id' => null
        ])->count();
    }

    public static function getSum()
    {
        $basketUser = Yii::$app->session['b_user'];
        if(!$basketUser){
            return 0;
        }
        $basketItems = static::find()->where([
            'b_user_id' => $basketUser,
            'order_id' => null
        ])->all();
        $sum = 0;
        foreach($basketItems as $item){
            $sum += $item['price'] * $item['quantity'];
        }
        return number_format($sum, 2);
    }

    
}
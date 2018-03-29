<?php

namespace app\models\sale;

use Yii;
use yii\db\ActiveRecord;
use app\models\sale\BasketUser;
use app\models\catalog\Quantity;

class Basket extends ActiveRecord
{

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

    public static function updateQuantity($productID, $quantity)
    {
        if(!BasketUser::hasBasketKey()){
            return false;
        }
        $availableQuantity = Quantity::find()
            ->where(['product_id' => $quantity])
            ->andWhere(['warehouse_id' => 1])
            ->one();
        if($quantity > $availableQuantity){
            $quantity = $availableQuantity;
        }
        $basketKey = BasketUser::getBasketKey();
        $basketRow = static::find()
            ->where(['b_user_id' => $basketKey])
            ->andWhere(['product_id' => $productID])
            ->one();
        $basketRow->quantity = $quantity;
        if($basketRow->update() !== false){
            return $quantity;
        }
        return false;
    }
}
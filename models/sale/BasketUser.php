<?php

namespace app\models\sale;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Security;
use yii\web\Cookie;
use yii\behaviors\TimestampBehavior;

class BasketUser extends ActiveRecord
{
    public static function tableName()
    {
        return "{{basket_user}}";
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public static function getBasketKey()
    {
        if(!Yii::$app->request->cookies->has('b_key')){
            $basketKey = (new Security)->generateRandomString(10);
            Yii::$app->response->cookies->add(new Cookie([
                'name' => 'b_key',
                'value' => $basketKey,
                'expire' => time()+60*60*24*30
            ]));
            $basketUser = new self();
            $basketUser->basket_key = $basketKey;
            if(!Yii::$app->user->isGuest){
                $basketUser->user_id = Yii::$app->user->getId();
            }
            if(!$basketUser->save()){
                return $basketUser->getErrors();
            }
            return $basketKey;
        }else{
            return Yii::$app->request->cookies->get('b_key');
        }
    }

    public static function attachUserToBasket()
    {
        $basketKey = static::getBasketKey();
        $basketUser = static::findOne(['basket_key' => $basketKey]);
        $basketUser->user_id = Yii::$app->user->getId();
        $basketUser->save();
    }

    public static function unsetBasketId()
    {

    }
}
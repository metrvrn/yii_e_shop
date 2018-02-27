<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\base\Security;
use app\models\Basket;
use app\models\BasketUser;
use app\models\catalog\Catalog;


class BasketController extends Controller
{
    public function actionIndex()
    {
        $basketItems = null;
        $basketSum = 0;
        $basketItemsCount = 0;
        $basketUserID = Yii::$app->session['b_user'];
        if(!empty($basketUserID)){
            $basketItems = Basket::findAll(['b_user_id' => $basketUserID]);
            foreach($basketItems as $item){
                $basketSum += $item['price'] * $item['quantity'];
                $basketItemsCount++;
            }
        }
        return $this->render('index', [
            'basketItems' => $basketItems,
            'basketSum' => $basketSum,
            'basketItemsCount' => $basketItemsCount
            ]);
    }

    public function actionAddAjax()
    {
        $session = Yii::$app->session;
        $basketUserID = $session['b_user'];
        if(!$basketUserID){
            $security = new Security();
            $basketUserID = $security->generateRandomString();
            $session['b_user'] = $basketUserID;
        }

        $request = Yii::$app->request;
        $productID = $request->get('productId');
        $quantity = $request->get('quantity');

        if($basket = Basket::findOne(['b_user_id' => $basketUserID, 'product_id' => $productID])){
            $basket->quantity = $basket->quantity + $quantity;
            $basket->save();
            return $this->asJson([
                'product_id' => $productID,
                'quantity' => $basket->quantity
            ]);
        }

        $product = Catalog::findOne(['product_id' => $productID]);

        $basket = new Basket();
        $basket->b_user_id = $basketUserID;
        $basket->product_id = $productID;
        $basket->price = 148.50;
        $basket->name = $product['name'];
        $basket->quantity = $quantity;
        if($basket->validate()){
            $basket->save();
            return $this->asJson([
                'product_id' => $productID,
                'quantity' => $basket->quantity,
                'model' => $basket->toArray()
            ]);
        }
        return $this->asJson(['error' => $basket->errors]);
    }
}
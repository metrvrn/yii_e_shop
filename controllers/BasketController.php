<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\base\Security;
use app\models\Basket;
use app\models\BasketUser;
use app\models\catalog\Catalog;
use yii\data\Pagination;


class BasketController extends Controller
{
    public function actionIndex()
    {
        $basketItems = null;
        $pagination = null;
        $basketUserID = Yii::$app->session->get('b_user');
        if(empty($basketUserID)){
            $basketItems = null;
        }else{
            $basketQuery = Basket::find()->where([
                'b_user_id' => $basketUserID,
                'order_id' => null
            ]);
            $pagination = new Pagination([
                'totalCount' => $basketQuery->count(),
                'pageSize' => 30
            ]);
            $basketItems = $basketQuery->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
        }
        return $this->render('index', [
            'basketItems' => $basketItems,
            'basketSum' => Basket::getSum(),
            'basketItemsCount' => Basket::getQuantity(),
            'pagination' => $pagination
            ]);
    }

    public function actionAddAjax()
    {
        $session = Yii::$app->session;
        $basketUserID = $session->get('b_user');
        if(!$basketUserID){
            $security = new Security();
            $basketUserID = $security->generateRandomString();
            $session->set('b_user', $basketUserID);
            $session['b_user.lifetemi'] = 60;
        }

        $session['b_user.lifetemi'] = 60;

        $request = Yii::$app->request;
        $productID = $request->get('productId');
        $quantity = $request->get('quantity');

        if($basket = Basket::findOne(['b_user_id' => $basketUserID, 'product_id' => $productID])){
            $basket->quantity = $basket->quantity + $quantity;
            $basket->update();
            return $this->asJson([
                'product_id' => $productID,
                'quantity' => $basket->quantity,
                'basketQuantity' => Basket::getQuantity(),
                'basketSum' => Basket::getSum(),
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
                'basketQuantity' => Basket::getQuantity(),
                'basketSum' => Basket::getSum(),
            ]);
        }
        return $this->asJson(['error' => $basket->errors]);
    }
}
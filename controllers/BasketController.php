<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\base\Security;
use app\models\sale\Basket;
use app\models\sale\BasketUser;
use app\models\catalog\Product;
use yii\data\Pagination;


class BasketController extends Controller
{
    public function actionIndex()
    {
        $basketItems = null;
        $pagination = null;
        $basketKey = BasketUser::getBasketKey();
        $basketQuery = Basket::find()->where([
            'b_user_id' => $basketKey,
            'order_id' => null
        ]);
        $pagination = new Pagination([
            'totalCount' => $basketQuery->count(),
            'pageSize' => 30
        ]);
        $basketItems = $basketQuery->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('index', [
            'basketItems' => $basketItems,
            'basketSum' => Basket::getSum(),
            'basketItemsCount' => Basket::getQuantity(),
            'pagination' => $pagination
        ]);
    }

    public function actionAddAjax()
    {
        $basketKey = BasketUser::getBasketKey();
        $request = Yii::$app->request;
        $productID = $request->get('productId');
        $quantity = $request->get('quantity');

        if($basket = Basket::findOne(['b_user_id' => $basketKey, 'product_id' => $productID])){
            $basket->quantity = $basket->quantity + $quantity;
            $basket->save();
            return $this->asJson([
                'product_id' => $productID,
                'quantity' => $basket->quantity,
                'basketQuantity' => Basket::getQuantity(),
                'basketSum' => Basket::getSum(),
            ]);
        }

        $product = Product::findOne(['id' => $productID]);

        $basket = new Basket();
        $basket->b_user_id = $basketKey;
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

    public function actionRemove()
    {
        $basketKey = BasketUser::getBasketKey();
        Basket::deleteAll(['b_user_id' => $basketKey]);
        return $this->redirect('index');
    }

    public function actionUpdate()
    {
        $request = Yii::$app->request;
        $productID = $request->get('id');
        $quantity = $request->get('quantity');
        if($uQuantity = Basket::updateQuantity($productID, $quantity)){
            $response = [
                'totalQuantity' => Basket::getQuantity(),
                'totalSum' => Basket::getSum(),
                'quantity' => $uQuantity,
                'productID' => $productID
            ];
            return $this->asJson($response);
        }
        return false;
    }

}
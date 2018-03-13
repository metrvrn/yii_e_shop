<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\sale\Basket;
use app\models\Order;

class OrderController extends Controller
{
    public function actionCheckout()
    {
        $user = Yii::$app->user->identity;
        $basketSum = Basket::getSum();
        $basketQuantity = Basket::getQuantity();

        return $this->render('checkout',[
            'user' => $user
        ]);
    }
}
<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\sale\Basket;
use app\models\sale\Payment;
use app\models\sale\Delivery;
use app\models\Order;

class OrderController extends Controller
{

    public function actionCheckout()
    {
            $user = Yii::$app->user->identity;
            $basketSum = Basket::getSum();
            $basketQuantity = Basket::getQuantity();
            $payments = Payment::find()->all();
            $deliveries = Delivery::find()->all();

            return $this->render('checkout',[
                'user' => $user,
                'basketSum' => $basketSum,
                'basketQuantity' => $basketQuantity,
                'payments' => $payments,
                'deliveries' => $deliveries
            ]);
    }

    public function actionTest()
    {
        return $this->render('test', ['post' => Yii::$app->request->post]);
    }
}
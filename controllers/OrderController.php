<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use app\models\sale\Basket;
use app\models\sale\Payment;
use app\models\sale\Delivery;
use app\models\sale\Order;
use app\models\sale\BasketUser;

class OrderController extends Controller
{

    public function actionCheckout()
    {
        $request = Yii::$app->request;
        if($request->getIsPost()){
            $order = new Order();
            $post = $request->post();
            if(!Yii::$app->user->getIsGuest()){
                $order->user_id = Yii::$app->user->getId();
            }
            $paymentId = $post['payment'];
            $payment = Payment::findOne(['id' => $paymentId]);
            $order->payment_name = $payment->name;
            $order->payment_description = $payment->description;
            $deliveryId = $post['delivery'];
            $delivery = Delivery::findOne(['id' => $deliveryId]);
            $order->delivery_name = $delivery->name;
            $order->delivery_description = $delivery->description;
            if($order->load($request->post(), '') and $order->save()){
                $basketUser = BasketUser::getBasketKey();
                Basket::updateAll(['order_id' => $order->id], "b_user_id = :basketUser", [':basketUser' => $basketUser]);
                BasketUser::reset();
                return $this->redirect(Url::toRoute(['order/success', 'id' => $order->id]));
            }
        }

        // if(Yii::$app->request->getIsPost()){
        //     return $this->render('test', ['data' => Yii::$app->request->post()]);
        // }

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
            'deliveries' => $deliveries,
        ]);
    }

    public function actionSuccess($id){
        return $this->render('success', ['id' => $id]);
    }
}
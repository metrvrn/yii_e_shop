<?php

namespace app\controllers\admin;

use app\models\sale\Order;
use app\models\sale\Basket;
use app\models\sale\Delivery;
use app\models\sale\Payment;
use yii\data\Pagination;


class OrderController extends AdminController
{
    public $layout = 'admin';

    public function actionIndex()
    {
        $orderQuery = Order::find();
        $page = new Pagination([
            'totalCount' => $orderQuery->count()
        ]);
        $orders = $orderQuery
            ->limit($page->limit)
            ->offset($page->offset)
            ->all();
        return $this->render('index', [
            'orders' => $orders,
            'page' => $page
        ]);
    }

    public function actionDetail($id)
    {
        $order = Order::findOne(['id' => $id]);
        $delivery = Delivery::find()->all();
        $payment = Payment::find()->all();
        $basketQuery = Basket::find()->where(['order_id' => $id])->orderBy('name');
        $page = new Pagination([
            'totalCount' => $basketQuery->count()
        ]);
        $basketItems = $basketQuery
            ->limit($page->limit)
            ->offset($page->offset)
            ->all();
        return $this->render('detail', [
            'order' => $order,
            'basketItems' => $basketItems,
            'delivery' => $delivery,
            'payment' => $payment
        ]);
    }
}
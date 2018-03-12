<?php

namespace app\controllers\admin;

use Yii;
use yii\web\Controller;
use app\models\sale\Delivery;
use app\models\sale\Payment;

class SaleController extends Controller
{
    public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDelivery()
    {
        $deliveries = Delivery::find()->all();
        return $this->render('delivery', [
            'deliveries' => $deliveries
        ]);
    }

    public function actionAddDelivery()
    {
        $delivery = new Delivery();
        $delivery->load(Yii::$app->request->post(), '');
        $delivery->save();
        $deliveries = Delivery::find()->all();
        return $this->render('delivery', [
            'deliveries' => $deliveries,
            'errors' => $delivery->getErrors()
        ]);
    }

    public function actionRemoveDelivery($id)
    {
        if($id){
            $delivery = Delivery::findOne($id);
            $delivery->delete();
        }
        $this->redirect('delivery');   
    }

    public function actionPayment()
    {
        $payments = Payment::find()->all();
        return $this->render('payment', [
            'payments' => $payments
        ]);
    }
}


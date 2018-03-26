<?php

namespace app\controllers\admin;

use Yii;
use app\models\sale\Payment;


class PaymentController extends AdminController
{
    public $layout = 'admin';

    public function actionIndex()
    {
        $payments = Payment::find()->all();
        return $this->render('index',[
            'payments' => $payments
        ]);
    }

    public function actionAdd()
    {
        if(Yii::$app->request->getIsPost()){
            $payment = new Payment();
            if($payment->load(Yii::$app->request->post(), '') and $payment->save()){
                return $this->redirect('index');
            }else{
                return $this->render('add', [
                    'payment' => $payment,
                    'errors' => $payment->getErrors()
                ]);
            }
        }
        return $this->render('add');
    }

    public function actionUpdate()
    {
        $payment = Payment::findOne(Yii::$app->request->get('id'));
        if(Yii::$app->request->getIsPost()){
            $post = Yii::$app->request->post();
            $payment->name = $post['name'];
            $payment->description = $post['description'];
            if($payment->save()){
                return $this->redirect('index');
            }
        }
        return $this->render('update', [
            'payment' => $payment,
            'errors' => $payment->getErrors()
        ]);
    }

    public function actionRemove($id)
    {
        $payment = Payment::findOne($id);
        $payment->delete();
        return $this->redirect('index');
    }
}
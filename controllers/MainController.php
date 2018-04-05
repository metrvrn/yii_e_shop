<?php

namespace app\controllers;
use Yii;
use yii\web\controller;
use yii\helpers\Url;
use app\models\catalog\Product;
use yii\db\ActiveQuery;
use app\models\catalog\Sections;
use yii\data\Pagination;

class MainController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDelivery()
    {
        return $this->render('delivery');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionTest()
    {   
        $message = Yii::$app->mailer->compose();
        $message->setFrom('yiishop@mail.ru')
        ->setTo('mr0094@gmail.com')
        ->setSubject('Новый заказ')
        ->setTextBody('test')
        ->send();
        
        return $this->render('test', [
            'data' => 'mail'
        ]);
    }

    public function actionAdmin()
    {
        return $this->redirect(Url::toRoute('admin/index'));
    }

}
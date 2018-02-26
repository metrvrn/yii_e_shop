<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\base\Security;
use app\models\Basket;
use app\models\BasketUser;


class BasketController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionAddAjax()
    {
        $session = Yii::$app->session;
        $basketUser = $session['b_user'];
        if(!$basketUser){
            $security = new Security();
            $basketUser = $security->generateRandomString();
            $session['b_user'] = $basketUser;
        }

        $request = Yii::$app->request;
        $productId = $request->post('productId');
        $quantity = $request->post('quantity');

        $basket = Basket::find()->where(['b_user' => $basketUser, 'product_id' => $productId]);

        return $this->asJson(['result' => $basketUser]);
    }
}
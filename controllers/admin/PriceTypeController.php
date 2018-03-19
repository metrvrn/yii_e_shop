<?php

namespace app\contrllers\admin;

use yii\web\Controller;
use app\models\sale\PriceYType;

class PriceTypeController extends Controller
{
    public function actionIndex()
    {
        $priceTypes = PriceType::find()->all();
        return $this->render('index', [
            'priceTypes' => $priceTypes
        ]);
    }
}
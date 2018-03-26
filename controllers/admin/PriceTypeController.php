<?php

namespace app\contrllers\admin;

use app\models\sale\PriceYType;

class PriceTypeController extends AdminController
{
    public function actionIndex()
    {
        $priceTypes = PriceType::find()->all();
        return $this->render('index', [
            'priceTypes' => $priceTypes
        ]);
    }
}
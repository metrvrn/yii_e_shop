<?php

namespace app\models\sale;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;


class Order extends ActiveRecord
{
    public static function tableName()
    {
        return 'order';
    }

    public function behaviors()
    {
        return[
            TimestampBehavior::className(),
        ];
    }
}
<?php

namespace app\models\sale;

use yii\db\ActiveRecord;


class Payment extends ActiveRecord
{
    public static function tableName()
    {
        return '{{payment}}';
    }
}
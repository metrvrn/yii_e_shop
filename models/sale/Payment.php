<?php

namespace app\models\sale;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;


class Payment extends ActiveRecord
{
    public static function tableName()
    {
        return '{{payment}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className()
        ];
    }

    public function rules()
    {
        return[
            [['description'], 'safe'],
            [['name'], 'required']
        ];
    }
}
<?php

namespace app\models;

use yii\db\ActiveRecord;


class UpdateTimestamps extends ActiveRecord
{
    const PRODUCTS = 'products';
    const PROPERTIES = 'properties';
    const PROPERTIES_TYPES = 'properties_types';
    const PRICES = 'prices';
    const PRICES_TYPES = 'prices_types';
    const WAREHOUSE = 'warehouse';
    const WAREHOUSE_REMAINS = 'warehouse_remains';

    public static function tableName()
    {
        return "{{update_timestamps}}";
    }

    public static function getLastUpdate($type)
    {
        $updateEntry = static::findOne(['type' => $type]);
        if($updateEntry){
            return $updateEntry->last_update;
        }
    }

    public function setLastUpdate($type, $timestamp)
    {
        $updateEntry = static::findOne(['type' => $type]);
        if($updateEntry){
            $updateEntry = new static;
            $updateEntry->type = $type;
            $updateEntry->last_update = $timestamp;
        }else{
            $updateEntry->last_update = $timestamp;
        }
        $updateEntry->save();
    }
}
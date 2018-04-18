<?php

namespace app\controllers\admin;

use Yii;
use app\models\SiteProperties;



class IndexController extends AdminController
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProperties()
    {
        $request = Yii::$app->request;
        $properties = SiteProperties::find()->indexBy('code')->all();
        $post = null;
        if($request->getIsPost()){
            $post = $request->post();
            foreach($post as $code => $data){
                $properties[$code]['data'] = $data;
                $properties[$code]->save(false);
            }
        }
        return $this->render('properties', [
            'properties' => $properties
        ]);
    }
}
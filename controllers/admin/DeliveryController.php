<?php

namespace app\controllers\admin;

use Yii;
use yii\web\Controller;
use app\models\sale\Delivery;


class DeliveryController extends Controller
{
    public $layout = "admin";

    public function actionIndex()
    {
        $deliveries = Delivery::find()->all();
        return $this->render('index', [
            'deliveries' => $deliveries
        ]);
    }

    public function actionAdd()
    {
        $delivery = new Delivery();
        if($delivery->load(Yii::$app->request->post(), '') and $delivery->save()){
            return $this->redirect('index');
        }
        return $this->render('add', [
            'errors' => $delivery->getErrors()
        ]);
    }

    public function actionUpdate()
    {
        if($delivery = Delivery::findOne(Yii::$app->request->get('id'))){
            if(Yii::$app->request->getIsPost()){
                $post = Yii::$app->request->post();
                $delivery->name = $post->name;
                $delivery->description = $post->description;
                if($delivery->update()){
                    return $this->render('index');
                }
            }    
            return $this->render('update', [
                'delivery' => $delivery,
                'errors' => $delivery->getErrors()
            ]);
        };
        return $this->redirect('index');
    }

    public function actionRemove($id)
    {
        if(is_numeric($id)){
            $delivery = Delivery::findOne($id);
            $delivery->delete();
        }
        $this->redirect('index');   
    }
}
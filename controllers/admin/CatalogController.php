<?php

namespace app\controllers\admin;

use app\utils\CatalogUploader;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CatalogController extends Controller
{
    public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpload()
    {
        return $this->render('upload', ['catalogMsg' => '']);
    }

    public function actionUploadCatalog()
    {
        $catalogMsg = 'Succes';
        $catalogUploader = new CatalogUploader();
        try{
            $catalogUploader->uploadCatalog();
        }catch(Exception $e){
            $catalogMsg = $e->getMessage() . " " . $e->getCode();
        }
        $this->redirect(['upload' ,['catalogMsg' => $catalogMsg]]);
    }

    public function actionUploadByAction($action = null)
    {
        $catalogUploader = new CatalogUploader();
        switch($action){
            case 'sections':
                $catalogUploader->uploadCatalogSections();
                break;
            default:
                throw new NotFoundHttpException("Action $action not found");
                break;
        }
    }
}


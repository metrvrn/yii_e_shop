<?php

namespace app\controllers\admin;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use app\utils\upload\PropertiesUploader;
use app\utils\upload\ProductsUploader;
use app\utils\upload\PropertiesTypesUploader;
use app\utils\upload\PricesTypesUploader;
use app\utils\upload\PriceUploader;
use app\utils\upload\WarehousesUploader;
use app\utils\upload\QuantityUploader;
use app\utils\upload\SectionsUploader;


class UploadController extends Controller
{
    public $layout = 'admin';
    
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUploadProducts($offset)
    {
        $productsUploader = new ProductsUploader();
        $productsUploader->upload($offset);
        return $this->asJson([
            'handled' => $productsUploader->handled,
            'total' => $productsUploader->totalCount
        ]);
    }

    public function actionUploadPropertiesTypes($offset)
    {
        $propertiesTypesUploader = new PropertiesTypesUploader();
        $propertiesTypesUploader->upload($offset);
        return $this->asJson([
            'handled' => $propertiesTypesUploader->handled,
            'total' => $propertiesTypesUploader->totalCount
        ]);
    }

    public function actionUploadProperties($offset)
    {
        $propertiesUploader = new PropertiesUploader();
        $propertiesUploader->upload($offset);
        return $this->asJson([
            'handled' => $propertiesUploader->handled,
            'total' => $propertiesUploader->totalCount
        ]);
    }

    public function actionUploadPricesTypes($offset)
    {
        $pricesTypesUploader = new PricesTypesUploader();
        $pricesTypesUploader->upload($offset);
        return $this->asJson([
            'handled' => $pricesTypesUploader->handled,
            'total' => $pricesTypesUploader->totalCount
        ]);
    }

    public function actionUploadPrices($offset)
    {
        $priceUploader = new PriceUploader();
        $priceUploader->upload($offset);
        return $this->asJson([
            'handled' => $priceUploader->handled,
            'total' => $priceUploader->totalCount
        ]);
    }

    public function actionUploadWarehouse($offset)
    {
        $warehouseUploader = new WarehousesUploader();
        $warehouseUploader->upload($offset);
        return $this->asJson([
            'handled' => $warehouseUploader->handled,
            'total' => $warehouseUploader->totalCount
        ]);
    }

    public function actionUploadQuantity($offset)
    {
        $quantityUploader = new QuantityUploader();
        $quantityUploader->upload($offset);
        return $this->asJson([
            'handled' => $quantityUploader->handled,
            'total' => $quantityUploader->totalCount
        ]);
    }

    public function actionUploadSections($offset)
    {
        $sectionsUploader = new SectionsUploader();
        $sectionsUploader->upload($offset);
        return $this->asJson([
            'handled' => $sectionsUploader->handled,
            'total' => $sectionsUploader->totalCount
        ]);
    }

    public function actionTruncateProducts()
    {
        Yii::$app->db->createCommand()->truncateTable('products')->execute();
        return $this->redirect(Url::toRoute('admin/upload/index'));
    }

    public function actionTruncatePropertiesTypes()
    {
        Yii::$app->db->createCommand()->truncateTable('properties_types')->execute();
        return $this->redirect(Url::toRoute('admin/upload/index'));
    }

    public function actionTruncateProperties()
    {
        Yii::$app->db->createCommand()->truncateTable('properties')->execute();
        return $this->redirect(Url::toRoute('admin/upload/index'));
    }

    public function actionTruncatePricesTypes()
    {
        Yii::$app->db->createCommand()->truncateTable('prices_types')->execute();
        return $this->redirect(Url::toRoute('admin/upload/index'));
    }

    public function actionTruncatePrices()
    {
        Yii::$app->db->createCommand()->truncateTable('price')->execute();
        return $this->redirect(Url::toRoute('admin/upload/index'));
    }

    public function actionTruncateWarehouse()
    {
        Yii::$app->db->createCommand()->truncateTable('warehouse')->execute();
        return $this->redirect(Url::toRoute('admin/upload/index'));
    }

    public function actionTruncateQuantity()
    {
        Yii::$app->db->createCommand()->truncateTable('quantity')->execute();
        return $this->redirect(Url::toRoute('admin/upload/index'));
    }

    public function actionTruncateSections()
    {
        Yii::$app->db->createCommand()->truncateTable('catalog_sections')->execute();
        return $this->redirect(Url::toRoute('admin/upload/index'));
    }

}
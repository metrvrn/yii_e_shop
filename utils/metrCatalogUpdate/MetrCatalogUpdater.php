<?php

namespace app\utils\metrCatalogUpdate;

use Yii;
use yii\base\Component;
use app\utils\FtpClient;
use app\utils\metrCatalogUpdate\MetrCatalogGetter;


class MetrCatalogUpdater extends Component
{

    private $catalogGetter = null;

    private $productsFieldsMap = [
        'product_id',
        'name',
        'section_id',
        'picture',
        'description',
        'xml_id'
    ];

    private $propertiesFieldsMap = [
        'product_id',
        'property_id',
        'value'
    ];

    private $pricesFieldsMap = [
        'product_id',
        'type_id',
        'value'
    ];

    private $quantityFieldsMap = [
        'product_id',
        'value',
        'store_id'
    ];

    private $propertiesTypeFieldsMap = [
        'property_type_id',
        'name'
    ];

    private $pricesTypeFieldsMap = [
        'price_id',
        'name',
        'xml_id'
    ];

    private $storesTypesFieldsMap = [
        'store_id',
        'name',
        'address'
    ];

    private $catalogSectionsFieldsMap = [
        'section_id',
        'parent_id',
        'name',
        'xml_id',
        'depth_level'
    ];

    private $filesFieldsMap = [
        'file_id',
        'name',
        'subfolder'
    ];

    public function __construct()
    {
        $this->catalogGetter = new MetrCatalogGetter();
    }
    
    public function updateCatalog()
    {
        $productsArr = $this->catalogGetter->get(MetrCatalogGetter::PRODUCTS);
        Yii::$app->db->createCommand()->truncateTable('catalog')->execute();
        Yii::$app->db->createCommand()
            ->batchInsert('catalog', $this->productsFieldsMap, $productsArr)
            ->execute();

        $catalogSectionsArr = $this->catalogGetter->get(MetrCatalogGetter::SECTIONS);
        Yii::$app->db->createCommand()->truncateTable('catalog_sections')->execute();
        Yii::$app->db->createCommand()
            ->batchInsert('catalog_sections', $this->catalogSectionsFieldsMap, $catalogSectionsArr)
            ->execute();

        $propertiesTypesArr = $this->catalogGetter->get(MetrCatalogGetter::PROPERTIES_TYPES);
        Yii::$app->db->createCommand()->truncateTable('catalog_property_type')->execute();
        Yii::$app->db->createCommand()
            ->batchInsert('catalog_property_type', $this->propertiesTypeFieldsMap, $propertiesTypesArr)
            ->execute();
        
        $propertiesArr = $this->catalogGetter->get(MetrCatalogGetter::PROPERTIES);
        Yii::$app->db->createCommand()->truncateTable('catalog_property')->execute();
        Yii::$app->db->createCommand()
            ->batchInsert('catalog_property', $this->propertiesFieldsMap, $propertiesArr)
            ->execute();
    }

    public function updatePrices()
    {
        $pricesArr = $this->catalogGetter->get(MetrCatalogGetter::PRICES);
        Yii::$app->db->createCommand()->truncateTable('catalog_prices')->execute();
        Yii::$app->db->createCommand()
            ->batchInsert('catalog_prices', $this->pricesFieldsMap, $pricesArr)
            ->execute();

        $pricesTypesArr = $this->catalogGetter->get(MetrCatalogGetter::PRICES_TYPES);
        Yii::$app->db->createCommand()->truncateTable('catalog_prices_types')->execute();
        Yii::$app->db->createCommand()
            ->batchInsert('catalog_prices_types', $this->pricesTypeFieldsMap, $pricesTypesArr)
            ->execute();
    }

    public function updateQuantity()
    {
        $quantityArr = $this->catalogGetter->get(MetrCatalogGetter::QUANTITY);
        Yii::$app->db->createCommand()->truncateTable('catalog_quantity')->execute();
        Yii::$app->db->createCommand()
            ->batchInsert('catalog_quantity', $this->quantityFieldsMap, $quantityArr)
            ->execute();

        $storesTypesArr = $this->catalogGetter->get(MetrCatalogGetter::STORE_TYPES);
        Yii::$app->db->createCommand()->truncateTable('catalog_stores_types')->execute();
        Yii::$app->db->createCommand()
            ->batchInsert('catalog_stores_types', $this->storesTypesFieldsMap, $storesTypesArr)
            ->execute();
    }

    public function uploadFiles()
    {
        $filesArr = $this->catalogGetter->get(MetrCatalogGetter::FILES);
        foreach($filesArr as &$file){
            $file[2] = "/images/catalog/".substr($file[1], 0, 3);
        }
        Yii::$app->db->createCommand()->truncateTable('files')->execute();
        Yii::$app->db->createCommand()
            ->batchInsert('files', $this->filesFieldsMap, $filesArr)
            ->execute();
    }
}

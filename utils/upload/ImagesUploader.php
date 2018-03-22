<?php

namespace app\utils\upload;

class ImagesUploader extends BaseUploader
{
    protected function getTableName()
    {
        return 'catalog_images';
    }

    protected function getFilename()
    {
        return 'images.csv';
    }

    protected function getFieldsMap()
    {
        return ['image_id', 'path'];
    }

    public function upload($offset)
    {
        $images = $this->getData($offset);
        foreach($images as &$image){
            $image[1] = substr($image[1], 0, 3) . "/" . $image[1];
        }
        $this->saveData($images);
    }
}
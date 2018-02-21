<?php

namespace app\utils\dataConvertor;

interface DataConvertorInterface
{
    public function toArray(string $data);
}
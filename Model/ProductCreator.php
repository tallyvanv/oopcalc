<?php
declare(strict_types=1);

class ProductCreator
{

    public function fetchProductData() : array
    {
        $data = [];
        //JSOn file open and decode
        $data = json_decode(file_get_contents('data/products.json'), true);

        return $data;
    }
}


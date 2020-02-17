<?php
declare(strict_types=1);

class ProductCreator
{

    public function fetchProductData() : array
    {
        $data = [];
        //JSOn file open and decode
        $data = json_decode(file_get_contents('/data/products.json'));


        //LOOP OVER to get customer objects
/*        foreach ($json AS $data) {
            //if data = + filter methods
            //convert to array of objects
            $list[] = new Product($data['name']);
        }*/
        return $data;
    }
}


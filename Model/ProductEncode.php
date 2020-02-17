<?php


class ProductEncode
{

    public function load() : array
    {
        $json = json_decode(file_get_contents('/data/products.json'));

        $list = [];
        foreach ($json AS $data) {
            //if data = + filter methods
            $list[] = new Product($data['name']);
        }
        return $list;
    }
}

//JSOn file open and decode -> LOOP OVER en dan customer objects
//converteer naar array van objecten
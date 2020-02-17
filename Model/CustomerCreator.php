<?php
declare(strict_types=1);

class CustomerCreator
{
    public function fetchUserData() : array
    {
        $data = [];
        //JSOn file open and decode
        $data = json_decode(file_get_contents('/data/customers.json'));


        //LOOP OVER to get customer objects
        /*        foreach ($json AS $data) {
                    //if data = + filter methods
                    //convert to array of objects
                    $list[] = new Product($data['name']);
                }*/
        return $data;
    }
}
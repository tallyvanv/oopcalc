<?php
declare(strict_types=1);

class CustomerCreator
{
    public function fetchUserData() : array
    {
        $data = [];
        //JSOn file open and decode
        $data = json_decode(file_get_contents('data/customers.json'), true);

        return $data;
    }
}
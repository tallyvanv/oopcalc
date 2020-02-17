<?php
declare(strict_types=1);

class UserEncode
{
    public function load() : array
    {
        $json = json_decode(file_get_contents('/data/customers.json'));

        $list = [];
        foreach ($json AS $data) {
            //if data = + filter methods
            $list[] = new User($data['name']);
        }
        return $list;
    }
}
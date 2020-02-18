<?php
declare(strict_types=1);

class Dataloader
{
    public function fetchUserData($filename) : array
    {
        $data = [];
        //JSOn file open and decode
        $data = json_decode(file_get_contents($filename), true);

        return $data;
    }
}
<?php
declare(strict_types=1);

class Dataloader
{
    public function fetchUserData($filename)
    {
        $data = [];
        $data = json_decode(file_get_contents($filename),true);
        return $data;
    }
/*    private const FILE_NAME = "";
    private $list = null;
    abstract function getObject(array $row);
    public function getAll() : array
    {
    if ($this->list = null) {
        $json = json_decode(file_get_contents(self::FILE_NAME), true);
        foreach ($json as $row) {
            $this->list[$row["id"]] = $this->getObject($row);
        }

    }

    }*/
}

/*class ProductLoader extends DataLoader {
    private const FILE_NAME = "products.json";

    public function getObject(array $row)
    {
        return new Product($row["name"], $row["id"], $row["description"], $row["price"]);
    }
}*/




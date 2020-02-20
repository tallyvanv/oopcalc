<?php
declare(strict_types=1);

class Dataloader
{
    private $customerObjects = [];
    private $productObjects = [];
    private $groupObjects = [];
    private function fetchUserData($filename)
    {
        $data = [];
        $data = json_decode(file_get_contents($filename),true);

        return $data;
    }

    private function customerLoader()
    {
        return $this->fetchUserData('data/customers.json');

    }

    private function productLoader()
    {
        return $this->fetchUserData('data/products.json');
    }

    private function groupLoader()
    {
        return $this->fetchUserData('data/groups.json');

    }

    private function customerObjectsCreator()
    {
        if (empty($this->customerObjects)) {
            foreach ($this->customerLoader() as $user) {
                array_push($this->customerObjects, new Customer($user['name'], $user['id'], $user['group_id']));
            }
        }
        return $this->customerObjects;

    }

    private function productObjectsCreator()
    {
        if (empty($this->productObjects)) {
            foreach ($this->productLoader() as $item) {
                array_push($this->productObjects, new Product($item['name'], $item['id'], $item['price'], $item['description']));
            }
        }
        return $this->productObjects;
    }

    private function groupObjectsCreator()
    {
        if (empty($this->groupObjects)){
        foreach ($this->groupLoader() as $group) {
            array_push($this->groupObjects, new CustomerGroup($group['id'], $group['name'], $group['fixed_discount'], $group['variable_discount'], $group['group_id']));
        }
        }
        return $this->groupObjects;
    }

    private function createAllObjects()
    {
        $this->customerObjectsCreator();
        $this->productObjectsCreator();
        $this->groupObjectsCreator();
    }

    public function objectsToSession()
    {
        $this->createAllObjects();
        $_SESSION['userArray'] = $this->customerObjects;
        $_SESSION['productArray'] = $this->productObjects;
        $_SESSION['allCustomerGroups'] = $this->groupObjects;
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




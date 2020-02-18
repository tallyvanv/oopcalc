<?php
declare(strict_types = 1);

require 'Model/Customer.php';
require 'Model/CustomerCreator.php';
require 'Model/Product.php';
require 'Model/ProductCreator.php';
require 'Model/CustomerGroup.php';
require 'Model/CustomerGroupCreator.php';

class HomepageController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(/*array $GET, array $POST*/)
    {
        //this is just example code, you can remove the line below
        $customer = new CustomerCreator();
        $customers = $customer->fetchUserData();

        $userArray = [];

        for ($i = 0; $i < count($customers); $i++) {
            $userArray[$i] = new Customer($customers[$i]['name'], $customers[$i]['id'], $customers[$i]['group_id']);
        }

        //var_dump($userArray);

        $product = new ProductCreator();
        $products = $product->fetchProductData();

        $productArray = [];

        for ($i = 0; $i < count($products); $i++) {
            $productArray[$i] = new Product($products[$i]['name'], $products[$i]['id'], $products[$i]['price'], $products[$i]['description']);
        }

        $group = new CustomerGroupCreator();
        $groups = $group->fetchUserData();

        $groupArray = [];

        foreach ($groups as $idCheck) {
            if ($idCheck['group_id'] == $userArray['$i']['group_id']) {
                array_push($groupArray, $idCheck);
            }
        }
         var_dump($groupArray);
        //var_dump($productArray);


        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/homepage.php';
    }
}
//$userDropdown = new UserEncode();
//$productDropdown = new ProductEncode();

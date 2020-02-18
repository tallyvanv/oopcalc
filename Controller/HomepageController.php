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

        foreach ($customers as $user) {
            array_push($userArray, new Customer($user['name'], $user['id'], $user['group_id']));
        }


        $product = new ProductCreator();
        $products = $product->fetchProductData();

        $productArray = [];

        foreach ($products as $item) {
            array_push($productArray, new Product($item['name'], $item['id'], $item['price'], $item['description']));
        }

        $group = new CustomerGroupCreator();
        $groups = $group->fetchUserData();

        $groupArray = [];

        foreach ($groups as $idCheck) {
            if ($idCheck['group_id'] === $userArray['$i']['group_id']) {
                array_push($groupArray, $idCheck);
            }
        }



        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/homepage.php';

        function whatIsHappening()
        {
            echo '<h2>$_GET</h2>';
            var_dump($_GET);
            echo '<h2>$_POST</h2>';
            var_dump($_POST);
            echo '<h2>$_COOKIE</h2>';
            var_dump($_COOKIE);
            echo '<h2>$_SESSION</h2>';
            var_dump($_SESSION);
        }
        whatIsHappening();

       /* if (!isset($_POST['customer'])){
            return;
        }
        else {
            $_POST['customer'] =
        }*/


    }
}

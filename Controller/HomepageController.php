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
      //  $player = new Customer($player->getName(), $customer->getId(), $customer->getGroupId);
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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!isset($_POST["customers"]) || !isset($_POST["products"])) {
                $_POST["customers"] = $_POST["customers"][0];
                $_POST["products"] = $_POST["products"][0];
            }
            else {
                $customerPost = $_POST["customers"];
                $productPost = $_POST["products"];

                //var_dump($userArray["$customerPost"]->getGroupId());

                $group = new CustomerGroupCreator();
                $groups = $group->fetchUserData();

                $groupArray = [];

                foreach ($groups as $idCheck) {
                    if ($idCheck['group_id'] == $userArray["$customerPost"]->getGroupId()) {
                        array_push($groupArray, $idCheck);
                    }
                }
                //var_dump($groupArray);
                $arrayFixedDiscount = $userArray["$customerPost"]->discountSorter($groupArray, 'fixed_discount');
                //var_dump($arrayFixedDiscount);
                $arrayVariableDiscount = $userArray["$customerPost"]->discountSorter($groupArray, 'variable_discount');
                //var_dump($arrayVariableDiscount);

                var_dump($productArray["$productPost"]->getPrice());
                $totalDiscount = $productArray["$productPost"]->totalDiscount($arrayFixedDiscount);
                var_dump($totalDiscount);
                $totalPrice = $productArray["$productPost"]->discountChecker($totalDiscount, $productArray["$productPost"]->getPrice());
                var_dump($totalPrice);

                $highestVariableDiscount = 0;
                if (is_array($productArray))
                {
                    $highestVariableDiscount = $productArray["$productPost"]->highestVariableDiscount($arrayVariableDiscount);
                }

                var_dump($highestVariableDiscount);

                $totalVariableDiscount = $productArray["$productPost"]->variableDiscountFixedAmount($highestVariableDiscount, $totalPrice);
                var_dump($totalVariableDiscount);

                $newPrice = $productArray["$productPost"]->variableDiscountCalculator($totalVariableDiscount, $totalPrice);
                var_dump($newPrice);




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

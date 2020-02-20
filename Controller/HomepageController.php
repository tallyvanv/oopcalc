<?php
declare(strict_types = 1);

require 'Model/Customer.php';

require 'Model/Product.php';

require 'Model/CustomerGroup.php';

require 'Model/Dataloader.php';

class HomepageController
{

    public function createObjects()
    {

        $loader = new Dataloader();
        $loader->objectsToSession();
    }

    public function calculateAll($productPost, $customerPost)
    {
        $groupArray = [];
        $userArray = $_SESSION['userArray'];
        $productArray = $_SESSION['productArray'];
        $allCustomerGroups = $_SESSION['allCustomerGroups'];
        //var_dump($groupArray);
        $arrayFixedDiscount = [];
        $arrayVariableDiscount = [];


        $groupID = $userArray["$customerPost"]->getGroupId();

        // groupId in this case refers to the group ID, which we know from user input (group id is linked).
        // groupsArray refers to the associative array which we converted from groups.json (we named it $groupData some previous lines)
        function findGroup ($groupId, $groupsObject)
        {
            foreach ($groupsObject as $group) {
                if ($group->getId() == $groupId) {
                    return $group;
                }
            }
        }

        // Using the findGroup function which returns a single group, which the user belongs to
        // we find other groups, which are linked together.
        while ($groupID !== null)
        {
            $groupsChain = findGroup($groupID,$allCustomerGroups);

            array_push($groupArray,$groupsChain);
            if (isset($groupsChain))
            {
                // If the current group over which we are looping has a group ID
                // we override the groupID variable with the new groupID of the former group.
                $groupID = $groupsChain->getGroupId();
            }
            else
            {
                $groupID = null;
            }
        }
        foreach ($groupArray as $fixedDiscount){
            array_push($arrayFixedDiscount, $fixedDiscount->getFixed());
        }
        foreach ($groupArray as $variableDiscount){
            array_push($arrayVariableDiscount, $variableDiscount->getVariable());
        }
        var_dump($groupArray);

        var_dump($arrayFixedDiscount);

        var_dump($arrayVariableDiscount);

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
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render()
    {
        if (!isset($_SESSION['userArray'])){
        $this->createObjects();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $customerPost = $_POST["customers"];
                $productPost = $_POST["products"];


                $this->calculateAll($productPost, $customerPost);
        }
      /*  you should not echo anything inside your controller - only assign vars here
        then the view will actually display them.

        load the view*/
      /*  function whatIsHappening()
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
      whatIsHappening();*/
        require 'View/homepage.php';
    }
}

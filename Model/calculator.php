<?php


class calculator
{
    private function findGroup ($groupId, $groupsObject)
    {
        foreach ($groupsObject as $group) {
            if ($group->getId() == $groupId) {
                return $group;
            }
        }
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


        // Using the findGroup function which returns a single group, which the user belongs to
        // we find other groups, which are linked together.
        while ($groupID !== null)
        {
            $groupsChain = $this->findGroup($groupID,$allCustomerGroups);

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

       //var_dump($groupArray);
        $_SESSION['groupArray'] = $groupArray;
        echo ($_SESSION['groupArray']);

        // var_dump($arrayFixedDiscount);

        // var_dump($arrayVariableDiscount);

        // var_dump($productArray["$productPost"]->getPrice());
        $totalDiscount = $this->totalDiscount($arrayFixedDiscount);
        // var_dump($totalDiscount);
        $_SESSION['$totalDiscount'] = $totalDiscount;
        echo ($_SESSION['totalDiscount']);
        $totalPrice = $this->discountChecker($totalDiscount, $productArray["$productPost"]->getPrice());
        //var_dump($totalPrice);

        $highestVariableDiscount = 0;
        if (is_array($productArray))
        {
            $highestVariableDiscount = $this->highestVariableDiscount($arrayVariableDiscount);
        }

      //  var_dump($highestVariableDiscount);

        $totalVariableDiscount = $this->variableDiscountFixedAmount($highestVariableDiscount, $totalPrice);
        //var_dump($totalVariableDiscount);
        $_SESSION['totalVariableDiscount'] =$totalVariableDiscount;
        echo ($_SESSION['totalVariableDiscount']);
        $newPrice = $this->variableDiscountCalculator($totalVariableDiscount, $totalPrice);
        // var_dump($newPrice);
        $_SESSION['newPrice'] = $newPrice;
        echo ('</br>');
        echo ($_SESSION['newPrice']);
    }
    public function totalDiscount($arrayName) : float
    {
        return $productTotalFixedDiscount = array_sum($arrayName);

    }
    public function discountChecker($productTotalFixedDiscount, $productPrice) : float
    {
        if ($productTotalFixedDiscount>$productPrice){
            return $productPrice = 0;
        }
        else {
            return $this->totalFixed($productTotalFixedDiscount, $productPrice);
        }
    }

    public function totalFixed($productTotalFixedDiscount, $productPrice): float
    {
        $productPrice = $productPrice - $productTotalFixedDiscount;
        return $productPrice;
    }

    public function highestVariableDiscount($variableArrayName)
    {
        return max($variableArrayName);
    }

    public function variableDiscountFixedAmount($percentageAmount, $totalPrice)
    {
        return $totalPrice * ($percentageAmount / 100);
    }

    public function variableDiscountCalculator($percentageAmount, $totalPrice)
    {
        return $totalPrice - $percentageAmount;
    }
}
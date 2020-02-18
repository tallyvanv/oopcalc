<?php
declare(strict_types=1);

class Product
{
    private $productName;
    private $productId;
    private $productPrice;
    private $productDescription;

    /**
     * Product constructor.
     * @param $productName
     * @param $productId
     * @param $productPrice
     * @param $productDescription
     */
    public function __construct($productName, $productId, $productPrice, $productDescription)
    {
        $this->productName = $productName;
        $this->productId = $productId;
        $this->productPrice = $productPrice;
        $this->productDescription = $productDescription;
    }


    public function getName() : string
    {
        return $this->productName;
    }
    public function getId() : int
    {
        return $this->productId;
    }

    public function getPrice() : float
    {
        return $this->productPrice;
    }

// this function is used to check if the total fixed discount surpasses the price
// if so it should set the product price to €0,00 or 0
//
    public function totalDiscount($arrayName) : float
    {
        $productTotalFixedDiscount = array_sum($arrayName);
        return $productTotalFixedDiscount;
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
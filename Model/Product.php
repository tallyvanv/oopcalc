<?php
declare(strict_types=1);

class Product
{
    private $productName;

    public function __construct(string $name)
    {
        $this->productName = $name;
    }

    public function getName() : string
    {
        return $this->productName;
    }
// this function is used to check if the total fixed discount surpasses the price
// if so it should set the product price to €0,00 or 0
//
    public function discountChecker($productTotalFixedDiscount, $productPrice) : int
    {
        if ($productTotalFixedDiscount>$productPrice){
            $productPrice = 0;
            return $productPrice;
        }
        else {
            $productPrice = $productPrice - $productTotalFixedDiscount;
            return $productPrice;
        }
    }
}
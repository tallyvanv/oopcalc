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

// this function is used to check if the total fixed discount surpasses the price
// if so it should set the product price to €0,00 or 0
//
    public function totalDiscount($arrayName) : int
    {
        return array_sum($arrayName);
    }
    public function discountChecker($productTotalFixedDiscount, $productPrice) : int
    {
        if ($productTotalFixedDiscount>$productPrice){
           return $productPrice = 0;
        }
    }

    public function totalFixed($productTotalFixedDiscount, $productPrice): int
    {
        $productPrice = $productPrice - $productTotalFixedDiscount;
        return $productPrice;
}

}
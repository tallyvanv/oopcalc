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


}
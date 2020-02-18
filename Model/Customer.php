<?php
declare(strict_types=1);

class Customer
{
    private $name;
    private $id;
    private $group_id;

    public function __construct(string $name, int $id, int $group_id)
    {
        $this->name = $name;
        $this->id = $id;
        $this->group_id = $group_id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getId() : int {
        return $this->id;
    }

    public function getGroupId(): int {
        return $this->group_id;
    }

    public function discountSorter($arrayName,$discount)
    {
        return array_column($arrayName, $discount);
    }

    public function variableDiscountSorter($variableArrayName)
    {
        return arsort($variableArrayName);
    }

    public function variableDiscountAmount($variableArrayName)
    {
        return $variableArrayName[0];
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

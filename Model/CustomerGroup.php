<?php
declare(strict_types=1);

class CustomerGroup
{
    private $id;
    private $name;
    private $discount;
    private $group_id;

    /**
     * CustomerGroup constructor.
     * @param $id
     * @param $name
     * @param $discount
     * @param $group_id
     */
    public function __construct($id, $name, $discount, $group_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->discount = $discount;
        $this->group_id = $group_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getGroupId()
    {
        return $this->group_id;
    }

    public function getDiscount($data)
    {
        if (isset($data['fixed_discount'])) {
            
        }

        return $this->discount;
    }

    public function getName()
    {
        return $this->name;
    }

}
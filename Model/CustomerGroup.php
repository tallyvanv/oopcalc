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

}
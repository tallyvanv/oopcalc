<?php
declare(strict_types=1);

class CustomerGroup
{
    private $id;
    private $name;
    private $fixed;
    private $variable;
    private $group_id;

    /**
     * CustomerGroup constructor.
     * @param $id
     * @param $name
     * @param $fixed
     * @param $variable
     * @param $group_id
     */
    public function __construct($id, $name, $fixed, $variable, $group_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->fixed = $fixed;
        $this->variable = $variable;
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

    public function getVariable()
    {
        return $this->variable;
    }
    public function getFixed()
    {

        return $this->fixed;
    }

    public function getName()
    {
        return $this->name;
    }

}
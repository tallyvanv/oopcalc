<?php
declare(strict_types=1);
/*ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL & ~E_NOTICE);*/

class User
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName() : string
    {
        return $this->name;
    }
}
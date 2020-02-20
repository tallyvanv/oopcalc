<?php
declare(strict_types = 1);

require 'Model/Customer.php';

require 'Model/Product.php';

require 'Model/CustomerGroup.php';

require 'Model/Dataloader.php';

require 'Model/calculator.php';


class HomepageController
{

    public function createObjects()
    {

        $loader = new Dataloader();
        $loader->objectsToSession();

    }



    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render()
    {
        if (!isset($_SESSION['userArray'])){
        $this->createObjects();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $customerPost = $_POST["customers"];
                $productPost = $_POST["products"];
        $this->calculate($_POST["products"], $_POST["customers"]);


        }
      /*  you should not echo anything inside your controller - only assign vars here
        then the view will actually display them.

        load the view*/
      /*  function whatIsHappening()
        {
            echo '<h2>$_GET</h2>';
            var_dump($_GET);
            echo '<h2>$_POST</h2>';
            var_dump($_POST);
            echo '<h2>$_COOKIE</h2>';
            var_dump($_COOKIE);
            echo '<h2>$_SESSION</h2>';
            var_dump($_SESSION);
        }
      whatIsHappening();*/
        require 'View/homepage.php';
    }
    public function calculate($productIndex, $customerIndex)
    {
        $calculator = new calculator();
        $calculator->calculateAll($productIndex, $customerIndex);
    }
}

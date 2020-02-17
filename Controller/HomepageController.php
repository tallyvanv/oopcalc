<?php
declare(strict_types = 1);

require 'Model/User.php';
require 'Model/UserEncode.php';
require 'Model/Product.php';
require 'Model/ProductEncode.php';

class HomepageController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        //this is just example code, you can remove the line below
        $user = new User('John Smith');

        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/homepage.php';
    }
}
$userDropdown = new UserEncode();
$productDropdown = new ProductEncode();

<?php
require('../model/database.php');


$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'login_customer';
    }
}

//instantiate variable(s)
$email = '';

if ($action == 'login_customer') {
    include('customer_login.php');
} else if ($action == 'get_customer') {
        include('product_register.php');
} else if ($action == 'register_product') {
        include('product_register.php');
}
?>

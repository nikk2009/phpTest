<?php
require('../model/database.php');


$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'display_customer_get';
    }
}

//instantiate variable(s)
$email = '';

if ($action == 'display_customer_get') {
    include('customer_get.php');
} else if ($action == 'get_customer') {
        include('incident_create.php');
} else if ($action == 'create_incident') {
        include('incident_create.php');
}
?>
<html>
<link rel="stylesheet" href="main.css" />
	
	

</html>
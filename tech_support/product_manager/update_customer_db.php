<?php
require('../model/database.php');

$customerID = filter_input(INPUT_POST, 'customerID');
$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$address = filter_input(INPUT_POST, 'address');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$postalCode = filter_input(INPUT_POST, 'postalCode');
$countryCode = filter_input(INPUT_POST, 'countryCode');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

if ($customerID != false){


$db = new PDO($dsn, $username, $password);
$query = 'UPDATE customers
			SET firstName = :firstName, lastName = :lastName, address = :address, city = :city
			state = :state, postalCode = :postalCode, countryCode = :countryCode, phone = :phone
			email = :email, password = :password
			WHERE customerID = :customerID';
$statement = $db-> prepare($query);
$statement ->bindValue(':customerID', $customerID);
$statement ->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$statement->closeCursor();

}
include('update_customer.php');
?>
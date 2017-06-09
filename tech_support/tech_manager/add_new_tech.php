<?php 

$techID = filter_input(INPUT_POST, 'techID');
$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$email = filter_input(INPUT_POST, 'email');
$phone = filter_input(INPUT_POST, 'phone');
$password = filter_input(INPUT_POST, 'password');

if($techID == null || $firstName ==  null || $lastName == null || $email == null || $phone == null || $password == null){
	$error = 'Invalid product data.';
	include("../errors/error.php");
}else{
	require('../model/database.php');
	
	$query =  'INSERT INTO technicians
					(techID, firstName, lastName, email, phone, password)
				VALUES
					(:techID, :firstName, :lastName, :email, :phone, :password)';
	$statment = $db ->prepare($query);
	$statment->bindValue(':techID', $techID);
	$statment->bindValue(':firstName', $firstName);
	$statment->bindValue(':lastName', $lastName);
	$statment->bindValue(':email', $email);
	$statment->bindValue(':phone', $phone);
	$statment->bindValue(':password', $password);
	$statment->execute();
	$statment->closeCursor();
	
	include("tech_manager/index.php");
	
}
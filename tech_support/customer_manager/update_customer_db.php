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


$fnameErr = $lnameErr = $addressErr = $cityErr = $stateErr = $zipErr = $phoneErr = $emailErr = $passwordErr = "";

$patternLength = '/^[a-zA-Z0-9@ .]{1,51}$/';
$zipLength = '/^[0-9]{1,51}$/';
$phonePattern = '/^\(\d{3}\) ?\d{3}-\d{4}/';
$passwordLength = '/^[a-zA-Z0-9]{6,21}$/';


	if(!preg_match($patternLength, $firstName) ||  $firstName == null){
		if($firstName == null){
			$fnameErr = 'Required';
			}else{
			$fnameErr = 'Too long or invalid characters';
			}
	}
	if(!preg_match($patternLength, $lastName)|| $lastName ==  null){
			if($lastName == null){
			$lnameErr = 'Required';
		}else{
			$lnameErr = 'Too long or invalid characters';
		}
	}
	if(!preg_match($patternLength, $address) ||  $address == null){
		if($address == null){
			$addressErr = 'Required';
		}else{
			$addressErr = 'Too long or invalid characters';
		}
	}
	if(!preg_match($patternLength, $city || $city == null) )
	{
		if($city == null){
			$cityErr = 'Required';
		}else{
			$cityErr = 'Too long or invalid characters';
		}
	}
	if(!preg_match($patternLength, $state) || $state == null )
	{
		if($state == null){
			$stateErr = 'Required';
		}else{
			$stateErr = 'Too long or invalid characters';
		}
	}
	if(!preg_match($zipLength, $postalCode) || $postalCode == null)
	{	if($postalCode == null){
			$zipErr = 'Required';
		}else{
			$zipErr = "Too long or invalid characters";
		}
	 }
	 if(!preg_match($phonePattern, $phone) || $phone == null)
	{	if($phone == null){
			$phoneErr = 'Required';
		}else{
			$phoneErr = "Use the (999) 999-9999 format.";
		}
	}
	if(!filter_var($email, FILTER_VALIDATE_EMAIL) || $email == null)
	{	if($email == null){
			$emailErr = 'Required';
		}else{
			$emailErr = "Must be valid email";
		}
	}
	if(!preg_match($passwordLength, $password) || $password == null)
	{	if($password == null){
			$phoneErr = 'Required';
		}else{
			$passwordErr = "Invalid Password, must be between 6 and 21 characters";
		}
	}

	$anyErr = $fnameErr + $lnameErr + $addressErr + $cityErr + $stateErr + $zipErr 
	+ $phoneErr + $emailErr + $passwordErr; 
	
	if ($customerID != false && $anyErr == null ){

		$query = "UPDATE customers
				  SET firstName = :firstName, lastName = :lastName, address = :address, city = :city,
					state = :state, postalCode = :postalCode, countryCode = :countryCode, phone = :phone,
					email = :email, password = :password
				  WHERE customerID = :customerID";
		$statement = $db-> prepare($query);
		
		$statement->bindValue(':customerID', $customerID);
		$statement->bindValue(':firstName', $firstName);
		$statement->bindValue(':lastName', $lastName);
		$statement->bindValue(':address', $address);
		$statement->bindValue(':city', $city);
		$statement->bindValue(':state', $state);
		$statement->bindValue(':postalCode', $postalCode);
		$statement->bindValue(':countryCode', $countryCode);
		$statement->bindValue(':phone', $phone);
		$statement->bindValue(':email', $email);
		$statement->bindValue(':password', $password);
			
		$statement->execute();
		$statement->closeCursor();
			

		}


include ('update_customer.php');
?>
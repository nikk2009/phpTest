<?php
include '../view\header.php';
require('../model/database.php');
$customerID =filter_input(INPUT_POST, 'customerID');


if ($customerID != false){


	$query = 'SELECT * FROM customers
					WHERE customerID = :customerID';
	$statement = $db-> prepare($query);
	$statement ->bindValue(':customerID', $customerID);
	$statement ->execute();
	$results=$statement->fetchAll(PDO::FETCH_ASSOC);
	$statement->closeCursor();

}
if(empty($emailErr)){
	$emailErr  = "";
}
if(empty($fnameErr)){
	$fnameErr  = "";
}
if(empty($lnameErr)){
	$lnameErr  = "";
}
if(empty($addressErr)){
	$addressErr  = "";
}
if(empty($cityErr)){
	$cityErr  = "";
}
if(empty($stateErr)){
	$stateErr  = "";
}
if(empty($phoneErr)){
	$phoneErr  = "";
}
if(empty($zipErr)){
	$zipErr  = "";
}
if(empty($passwordErr)){
	$passwordErr  = "";
}
?>
<html>
<link rel="stylesheet" href="../main.css" />
<h1>Update Customer</h1>
	<form action='update_customer_db.php' method = "post" >
		<?php foreach ($results as $result) : ?>
			<label>First Name: </label><span style="color:red"> <?php echo $fnameErr;?></span>
			<input type="text" name="firstName" value="<?php echo $result['firstName'] ?>"><br>
			<label>Last Name: </label><span style="color:red"> <?php echo $lnameErr;?></span>
			<input type="text" name="lastName" value="<?php echo $result['lastName'] ?>"><br>
			<label>Address: </label><span style="color:red"> <?php echo $addressErr;?></span>
			<input type="text" name="address" value="<?php echo $result['address'] ?>"><br>
			<label>City: </label></label><span style="color:red"> <?php echo $cityErr;?></span>
			<input type="text" name="city" value="<?php echo $result['city'] ?>"><br>
			<label>State: </label></label><span style="color:red"> <?php echo $stateErr;?></span>
			<input type="text" name="state" value="<?php echo $result['state'] ?>"><br>
			<label>Postal Code: </label><span style="color:red"> <?php echo $zipErr;?></span>
			<input type="text" name="postalCode" value="<?php echo $result['postalCode'] ?>"><br>
			<label>Country Code: </label>
			<input type="text" name="countryCode" value="<?php echo $result['countryCode'] ?>"><br>
			<label>Phone: </label><span style="color:red"> <?php echo $phoneErr;?></span>
			<input type="text" name="phone" value="<?php echo $result['phone'] ?>"><br>
			<label>Email: </label><span style="color:red"> <?php echo $emailErr;?></span>
			<input type="text" name="email" value="<?php echo $result['email'] ?>"><br>
			<label>Password: </label><span style="color:red"> <?php echo $passwordErr;?></span>
			<input type="text" name="password" value="<?php echo $result['password'] ?>"><br>
			<input type='hidden' name='customerID' value="<?php echo $result['customerID'] ?>" >
			<input type="submit" value="Update Customer">
		<?php endforeach; ?>
	</form> 			
	<br>
	<a href="index.php">Search Customers</a></li>

</html>

<?php include '../view/footer.php'; ?>
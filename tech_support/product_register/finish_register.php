<?php 
include '../view/header.php'; 
require('../model/database.php');

$customerID =filter_input(INPUT_POST, 'customerID');
$productCode =filter_input(INPUT_POST, 'productCode');

//$timezone = date_default_timezone_get();
$date = date('Y-m-d', time());
//echo $date;
//echo $customerID;
//echo $productCode;

if($customerID == null || $productCode == null){
	$error = 'Some field is blank. Please try to register product again.';
	include("../errors/error.php");
}else{
	$query ='INSERT INTO registrations
				(customerID, productCode, registrationDate)
			VALUES
				(:customerID, :productCode, :date)';
	$statement=$db ->prepare($query);
	$statement->bindValue(':customerID', $customerID);
	$statement->bindValue(':productCode', $productCode);
	$statement->bindValue(':date', $date);
	$statement->execute();
	$statement->closeCursor();	
}


?>

<html>
<link rel="stylesheet" href="../main.css" />
    <h2>Register Product</h2>
		Product ( <?php echo $productCode; ?> ) was registered successfully;

</html>
<?php include '../view/footer.php'; ?>
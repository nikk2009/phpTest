<?php 
include '../view/header.php'; 
require('../model/database.php');

$customerID =filter_input(INPUT_POST, 'customerID');
$productCode =filter_input(INPUT_POST, 'productCode');
$title =filter_input(INPUT_POST, 'title');
$description =filter_input(INPUT_POST, 'description');
$dateOpened = date('Y-m-d', time());

$query = 'SELECT MAX(incidentID) as maxID FROM incidents';
$statement = $db-> prepare($query);
$statement ->execute();
$products=$statement ->fetchAll(PDO::FETCH_ASSOC);
$statement ->closeCursor();

foreach ($products as $maxID) :
	 $incidentID = intval($maxID['maxID']) + 1;
endforeach;

if($customerID == null || $productCode == null || $title == null || $description == null){
	$error = 'All fields must be filled out';
	include("../errors/error.php");
}else{
	$query ='INSERT INTO incidents
				(incidentID, customerID, productCode, techId, dateOpened, dateClosed, title, description)
			VALUES
				(:incidentID, :customerID, :productCode, null, :dateOpened, null, :title, :description)';
	$statement=$db ->prepare($query);
	$statement->bindValue(':incidentID', $incidentID);
	$statement->bindValue(':customerID', $customerID);
	$statement->bindValue(':productCode', $productCode);
	$statement->bindValue(':dateOpened', $dateOpened);
	$statement->bindValue(':title', $title);
	$statement->bindValue(':description', $description);
	$statement->execute();
	$statement->closeCursor();	
}

?>

<html>
<link rel="stylesheet" href="../main.css" />

    <h2>Create Incident</h2>
		This incident was created.
		
</html>
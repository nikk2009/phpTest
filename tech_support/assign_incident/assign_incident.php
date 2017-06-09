<?php 
include '../view/header.php';
require('../model/database.php');
session_start();

$techID = $_SESSION['techID'];
$incidentID = $_SESSION['incidentID'];

$query='SELECT c.firstName as firstName, c.lastName as lastName, productCode, incidentID
		FROM incidents i
		INNER JOIN customers c  
    	ON c.customerID = i.customerID
		WHERE incidentID = :incidentID';
$statement=$db-> prepare($query);
$statement ->bindValue(':incidentID', $incidentID);
$statement ->execute();
$incidents=$statement->fetchAll(PDO::FETCH_ASSOC);
$statement->closeCursor();

$query ='SELECT techID, firstName, lastName FROM technicians
		 WHERE techID = :techID';
$statement=$db-> prepare($query);
$statement ->bindValue(':techID', $techID);
$statement ->execute();
$techs=$statement->fetchAll(PDO::FETCH_ASSOC);
$statement->closeCursor();

foreach($incidents as $incident){
	$customerName = $incident['firstName']." ".$incident['lastName'];
	$productCode = $incident['productCode'];
}

foreach($techs as $tech){
	$techName = $tech['firstName']." ".$tech['lastName'];
}

?>

<html>
<link rel="stylesheet" href="../main.css" />;
<h2>Assign Incident</h2>
	<label>Customer: <?php echo $customerName; ?></label>
	<label>Product: <?php echo $productCode; ?></label>
	<label>Technician: <?php echo $techName; ?></label>
	<br>
	<form action='assign_incident_finish.php' >
		<input type="submit" value="Select">				
	</form>
</html>

<?php include '../view/footer.php'; ?>
<?php 
include '../view/header.php';
require('../model/database.php');
session_start();

$techID = $_SESSION['techID'];
$incidentID = $_SESSION['incidentID'];

$query='UPDATE incidents
		SET techID = :techID
		WHERE incidentID = :incidentID';
$statement=$db-> prepare($query);
$statement ->bindValue(':incidentID', $incidentID);
$statement ->bindValue(':techID', $techID);
$statement ->execute();
$statement->closeCursor();
?>

<html>
<link rel="stylesheet" href="../main.css" />;
<h2>Assign Incident</h2>
	<br>
	This incident was assigned to a technician
	<br>
	<a href="index.php">Select another incident.</a></li>
</html>

<?php include '../view/footer.php'; ?>
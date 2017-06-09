<?php 
require('../model/database.php');

$techID =filter_input(INPUT_POST, 'techID');

if ($techID != false){
	$query = 'DELETE FROM technicians
				WHERE techID = :techID';
	$statement = $db->prepare($query);
	$statement ->bindValue(':techID', $techID);
	$statement -> execute();
	//$success = $statement -> ececute();
	$statement->closeCursor();
}

include('index.php');

?>
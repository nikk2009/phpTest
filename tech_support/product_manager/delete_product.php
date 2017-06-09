<?php 
require('../model/database.php');

$productCode =filter_input(INPUT_POST, 'productCode');

if ($productCode != false){
	$query = 'DELETE FROM products
				WHERE productCode = :productCode';
	$statement = $db->prepare($query);
	$statement ->bindValue(':productCode', $productCode);
	$statement -> execute();
	//$success = $statement -> ececute();
	$statement->closeCursor();
}

include('index.php');

?>
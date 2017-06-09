<?php 

$productCode = filter_input(INPUT_POST, 'productCode');
$name = filter_input(INPUT_POST, 'name');
$version = filter_input(INPUT_POST, 'version', FILTER_VALIDATE_FLOAT);
$releaseDate = filter_input(INPUT_POST, 'releaseDate');

$releaseDate = date('Y-m-d', strtotime($releaseDate));


if($productCode == null || $name ==  null || $version == null || $version == false || $releaseDate == null){
	$error = 'Invalid product data.';
	include("../errors/error.php");
}else{
	require('../model/database.php');
	
	$query =  'INSERT INTO PRODUCTS
					(productCode, name, version, releaseDate)
				VALUES
					(:productCode, :name, :version, :releaseDate)';
	$statment = $db ->prepare($query);
	$statment->bindValue(':productCode', $productCode);
	$statment->bindValue(':name', $name);
	$statment->bindValue(':version', $version);
	$statment->bindValue(':releaseDate', $releaseDate);
	$statment->execute();
	$statment->closeCursor();
	
	include("add_product.php");
	
}
 
?>
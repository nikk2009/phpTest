<?php
include '../view\header.php';

require('../model/database.php');
// require('../model/product_db.php');

?>

<html>
<link rel="stylesheet" href="../main.css" />

<h1>Add product</h1>
<form action='add_new_product.php' method = "post" >

	<label>Code: </label>
	<input type = "text" name = "productCode"><br>
	<label>Name: </label>
	<input type = "text" name = "name"><br>
	<label>Version: </label>
	<input type = "text" name = "version"><br>
	<label>Release Date: </label>
	<input type = "text" name = "releaseDate"><br>
  <input type="submit" value="Add Product">
</form> 
<a href="index.php">Product List</a></li>
</html>
<?php include '../view\footer.php'; ?>
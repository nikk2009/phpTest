<?php
include '../view\header.php';

require('../model/database.php');
// require('../model/product_db.php');

?>

<html>
<link rel="stylesheet" href="../main.css" />

<h1>Add Technician</h1>
<form action='add_new_tech.php' method = "post" >
	<label>Technician ID: </label>
	<input type = "text" name = "techID"><br>
	<label>First Name: </label>
	<input type = "text" name = "firstName"><br>
	<label>Last Name: </label>
	<input type = "text" name = "lastName"><br>
	<label>Email: </label>
	<input type = "text" name = "email"><br>
	<label>Phone: </label>
	<input type = "text" name = "phone"><br>
	<label>Password: </label>
	<input type = "text" name = "password"><br>
  <input type="submit" value="Add Product">
</form> 
<a href="index.php">Technician List</a></li>
</html>
<?php include '../view\footer.php'; ?>

<?php
include '../view\header.php';

require('../model/database.php');
// require('../model/product_db.php');

$db = new PDO($dsn, $username, $password);
$query = 'SELECT * FROM products
			ORDER BY productCode';
$statement = $db-> prepare($query);
//$statement ->bindValue(':productCode','productCode');
$statement ->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
$statement->closeCursor();

?>
<html>
<link rel="stylesheet" href="../main.css" />
<h1>Product List</h1>
<table>
  <tr>
    <th>Code</th>
    <th>Name</th>
    <th>Version</th>
	<th>Release Date</th>
	<th>     </th>
  </tr>
  <?php foreach ($results as $result) : ?>
  <tr>
	<th><?php echo $result['productCode']; ?>
	<th><?php echo $result['name']; ?>
	<th><?php echo $result['version']; ?>
	<th><?php echo $result['releaseDate']; ?>
	<th><form action = 'delete_product.php'  method = 'post'>
	<input  type='hidden' name= 'productCode'
	value = '<?php echo $result['productCode']; ?>' >
	<input type="submit" value="Delete">
	</form></th>
  </tr>
  <?php endforeach; ?>
</table>
<br>
<a href="add_product.php">Add Product</a></li>
<html>

<?php include '../view\footer.php'; ?>
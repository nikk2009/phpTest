<?php


include '../view\header.php';

require('../model/database.php');
// require('../model/product_db.php');

$db = new PDO($dsn, $username, $password);
$query = 'SELECT * FROM technicians
			ORDER BY techID';
$statement = $db-> prepare($query);
$statement ->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
$statement->closeCursor();


?>
<h1>Technician List</h1>
<link rel="stylesheet" href="../main.css" />
<table>
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
	<th>Phone</th>
	<th>Password</th>
	<th>     </th>
  </tr>
  <?php foreach ($results as $result) : ?>
  <tr>
	<th><?php echo $result['firstName']; ?>
	<th><?php echo $result['lastName']; ?>
	<th><?php echo $result['email']; ?>
	<th><?php echo $result['phone']; ?>
	<th><?php echo $result['password']; ?>
	<th><form action = 'delete_tech.php'  method = 'post'>
	<input  type='hidden' name= 'techID'
	value = "<?php echo $result['techID'] ?>" >
	<input type="submit" value="Delete">
	</form></th>
  </tr>
  <?php endforeach; ?>
</table>
<br>
<a href="add_tech.php">Add Technician</a></li>
<?php include '../view\footer.php'; ?>
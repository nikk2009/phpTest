<?php
include '../view/header.php'; 

require('../model/database.php');
$lastName =filter_input(INPUT_GET, 'lastName');

if ($lastName != false){
	
	$query='SELECT * FROM customers WHERE lastName=:lastName';
	$statement=$db-> prepare($query);
	$statement ->bindValue(':lastName', $lastName);
	$statement ->execute();
	$results=$statement->fetchAll(PDO::FETCH_ASSOC);
	$statement->closeCursor();
} else {
	$results=array();
}

?>

<html>
<link rel="stylesheet" href="../main.css" />

<form action='index.php' method="get" >
	<h1>Customer Search</h1>
	<label>Last Name: </label>
	<input type="text" name="lastName"><br>
	<input type="submit" value="Search">
</form>

<h1>Results</h1>
<?php if($results != null): ?>
	<table>
	  <tr>
	    <th>Name</th>
	    <th>Email</th>
		<th>City</th>
		<th>&nbsp;</th>
	  </tr>
	<?php foreach ($results as $result) : ?>
	<tr>
		<td><?php echo $result['firstName'].' '. $result['lastName']; ?> </td>
		<td><?php echo $result['email']; ?> </td>
		<td><?php echo $result['city']; ?> </td>
		<td>
			<form action='update_customer.php'  method='post'>
				<input type='hidden' name='customerID' value="<?php echo $result['customerID'] ?>" >
				<input type="submit" value="Select">
			</form>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</html>

<?php include '../view/footer.php'; ?>



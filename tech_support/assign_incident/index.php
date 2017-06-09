<?php 
include '../view/header.php'; 
require('../model/database.php');	

session_start();


$query = 	'SELECT incidentID, c.firstName, c.lastName, productCode, dateOpened, title, description 
			FROM incidents i 
			INNER JOIN customers c
				ON c.customerID = i.customerID';
$statement = $db-> prepare($query);
$statement ->execute();
$incidents=$statement->fetchAll(PDO::FETCH_ASSOC);
$statement->closeCursor();



?>
<html>
<link rel="stylesheet" href="../main.css" />
	<h2>Select Incident</h2>
	<table>
		<tr>
			<th>Name</th>
			<th>Product</th>
			<th>Date Opened</th>
			<th>Title</th>
			<th>Description</th>
			<th>&nbsp;</th>
		</tr>
	
		<?php foreach ($incidents as $incident) : ?>
		<?php $_SESSION['incidentID'] = $incident['incidentID']; ?>	
		<tr>
			<td><?php echo $incident['firstName'].' '. $incident['lastName']; ?> </td>
			<td><?php echo $incident['productCode']; ?> </td>
			<td><?php echo $incident['dateOpened']; ?> </td>
			<td><?php echo $incident['title']; ?> </td>
			<td><?php echo $incident['description']; ?> </td>
			<td>
				<form action='select_tech.php' >
					<input type="hidden" >
					<input type="submit" value="Select">
				</form>
			</td>
		</tr>
		
		<?php endforeach; ?>
	</table>

</html>
<?php include '../view/footer.php'; ?>
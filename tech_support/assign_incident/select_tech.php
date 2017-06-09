<?php 
include '../view/header.php';
require('../model/database.php');
session_start();

//$_SESSION['techID'] = "";

$query ='SELECT COUNT(incidentID) as incidentCount, i.techID as techID, t.firstName, t.lastName
		From incidents i
		INNER JOIN technicians t
			ON t.techID = i.techID
		GROUP BY techID';
$statement = $db-> prepare($query);
$statement ->execute();
$technicians=$statement->fetchAll(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>

<html>
<link rel="stylesheet" href="../main.css" />
	<table>
	  <tr>
	    <th>Name</th>
	    <th>Open Incidents</th>
		<th>&nbsp;</th>
	  </tr>
	<?php foreach ($technicians as $result) : ?>
	<tr>
		<td><?php echo $result['firstName'].' '. $result['lastName']; ?> </td>
		<td><?php echo $result['incidentCount']; ?> </td>
		<td>
			<form action='assign_incident.php' >
				<?php $_SESSION['techID'] = $result['techID']; ?>
				<input type="submit" value="Select">				
			</form>

		</td>
	</tr>
	<?php endforeach; ?>
	</table>
</html>

<?php include '../view/footer.php'; ?>